<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['inscripcion', 'pagos'])
            ->latest()
            ->get();

        return view('admin.pagos.index', compact('alumnos'));
    }

    public function showComprobante(Pago $pago)
    {
        if (!$pago->comprobante) {
            abort(404, 'No hay comprobante registrado.');
        }

        if (!Storage::disk('public')->exists($pago->comprobante)) {
            abort(404, 'El comprobante no existe en el servidor.');
        }

        return response()->file(Storage::disk('public')->path($pago->comprobante));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,Pagado,Vencido,Exonerado',
            'fecha_pago' => 'nullable|date',
            'observacion' => 'nullable|string',
        ]);

        $pago->update([
            'estado' => $request->estado,
            'fecha_pago' => $request->fecha_pago ?: null,
            'observacion' => $request->observacion,
        ]);

        $alumno = $pago->alumno()->with('pagos')->first();

        if ($alumno) {
            $pagos = $alumno->pagos;

            $tieneDeuda = $pagos->contains(function ($item) {
                return in_array($item->estado, ['Pendiente', 'Vencido']);
            });

            $alumno->update([
                'estado_financiero' => $tieneDeuda ? 'Con deuda' : 'Al día',
            ]);
        }

        return back()->with('success', 'Pago actualizado correctamente.');
    }
}