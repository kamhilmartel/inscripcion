<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Inscripcion;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InscripcionAdminController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::latest()->get();
        return view('admin.inscripciones.index', compact('inscripciones'));
    }

    public function updateEstado(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,Validada,Observada',
        ]);

        try {
            $inscripcion->estado = $request->estado;
            $inscripcion->save();

            if ($request->estado === 'Validada') {
                $alumno = Alumno::firstOrCreate(
                    ['inscripcion_id' => $inscripcion->id],
                    [
                        'codigo' => 'ALU-' . str_pad($inscripcion->id, 4, '0', STR_PAD_LEFT),
                        'estado_academico' => 'Activo',
                        'estado_financiero' => 'Con deuda',
                        'observacion' => 'Alumno generado desde inscripción validada',
                    ]
                );

                $pagosBase = [
                    ['concepto' => 'Pensión 1', 'monto' => 150],
                    ['concepto' => 'Pensión 2', 'monto' => 150],
                    ['concepto' => 'Pensión 3', 'monto' => 150],
                    ['concepto' => 'Pensión 4', 'monto' => 150],
                    ['concepto' => 'Diploma',  'monto' => 50],
                    ['concepto' => 'Matrícula',  'monto' => 50],
                ];

                foreach ($pagosBase as $item) {
                    Pago::firstOrCreate(
                        [
                            'alumno_id' => $alumno->id,
                            'concepto' => $item['concepto'],
                        ],
                        [
                            'monto' => $item['monto'],
                            'estado' => 'Pendiente',
                            'fecha_vencimiento' => null,
                            'fecha_pago' => null,
                            'comprobante' => null,
                            'observacion' => 'Pago generado automáticamente al validar inscripción',
                        ]
                    );
                }
            }

            return redirect()
                ->route('admin.inscripciones.index')
                ->with('success', 'Estado actualizado correctamente.');
        } catch (\Throwable $e) {
            Log::error('Error al actualizar estado de inscripción', [
                'inscripcion_id' => $inscripcion->id,
                'mensaje' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.inscripciones.index')
                ->with('error', 'No se pudo actualizar el estado.');
        }
    }

    public function showVoucher(Inscripcion $inscripcion)
{
    if (!$inscripcion->voucher) {
        return back()->with('error', 'No hay voucher registrado.');
    }

    return redirect()->away($inscripcion->voucher);
}

    public function destroy(Inscripcion $inscripcion)
    {
        if ($inscripcion->voucher && Storage::disk('public')->exists($inscripcion->voucher)) {
            Storage::disk('public')->delete($inscripcion->voucher);
        }

        $inscripcion->delete();

        return redirect()
            ->route('admin.inscripciones.index')
            ->with('success', 'Inscripción eliminada correctamente.');
    }
}