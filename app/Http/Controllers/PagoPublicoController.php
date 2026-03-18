<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Inscripcion;
use App\Models\Pago;
use App\Services\SupabaseStorageService;
use Illuminate\Http\Request;

class PagoPublicoController extends Controller
{
    public function form()
    {
        return view('pagos.consulta');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'dni' => ['required', 'digits:8'],
        ]);

        $inscripcion = Inscripcion::where('dni', $request->dni)->first();

        if (!$inscripcion) {
            return back()->with('error', 'No se encontró un registro con ese DNI.');
        }

        $alumno = Alumno::with('pagos')->where('inscripcion_id', $inscripcion->id)->first();

        if (!$alumno) {
            return back()->with('error', 'Aún no tienes un registro de alumno validado.');
        }

        return view('pagos.consulta', [
            'inscripcion' => $inscripcion,
            'alumno' => $alumno,
            'pagos' => $alumno->pagos()->orderBy('id')->get(),
            'dniBuscado' => $request->dni,
        ]);
    }

    public function subirVoucher(Request $request, Pago $pago, SupabaseStorageService $storageService)
    {
        $request->validate([
            'voucher_pago' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'dni' => ['required', 'digits:8'],
        ]);

        $pago->load('alumno.inscripcion');

        if (!$pago->alumno || !$pago->alumno->inscripcion) {
            return back()->with('error', 'No se encontró la relación del pago con el alumno.');
        }

        if ($pago->alumno->inscripcion->dni !== $request->dni) {
            return back()->with('error', 'El DNI no coincide con el registro del pago.');
        }

        $upload = $storageService->upload($request->file('voucher_pago'), 'pagos');

        $pago->update([
            'comprobante' => $upload['url'],
            'estado' => 'Pendiente',
            'observacion' => 'Voucher subido por el participante. Pendiente de validación administrativa.',
        ]);

        return back()->with('success', 'Voucher subido correctamente. Ahora debe esperar la validación administrativa.');
    }
}