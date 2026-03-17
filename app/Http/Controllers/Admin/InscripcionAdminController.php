<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Inscripcion;
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
            Alumno::firstOrCreate(
                ['inscripcion_id' => $inscripcion->id],
                [
                    'codigo' => 'ALU-' . str_pad($inscripcion->id, 4, '0', STR_PAD_LEFT),
                    'estado_academico' => 'Activo',
                    'estado_financiero' => 'Observado',
                    'observacion' => 'Alumno generado desde inscripción validada',
                ]
            );
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
            ->with('error', 'No se pudo actualizar el estado. Revise la configuración del alumno.');
    }
}

    public function showVoucher(Inscripcion $inscripcion)
    {
        if (!$inscripcion->voucher) {
            abort(404, 'No hay voucher registrado.');
        }

        if (!Storage::disk('public')->exists($inscripcion->voucher)) {
            abort(404, 'El voucher no existe en el servidor.');
        }

        return response()->file(Storage::disk('public')->path($inscripcion->voucher));
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