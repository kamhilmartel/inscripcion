<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function create()
    {
        return view('inscripciones.create');
    }

    public function success()
    {
        return view('inscripciones.success');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => ['required', 'string', 'max:120'],
            'apellidos' => ['required', 'string', 'max:120'],
            'celular' => ['required', 'string', 'max:20'],
            'dni' => ['required', 'digits:8', 'unique:inscripciones,dni'],
            'grado_academico' => ['required', 'in:Bachiller,Titulado'],
            'voucher' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        $voucherPath = $request->file('voucher')->store('vouchers', 'public');

        Inscripcion::create([
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'celular' => $validated['celular'],
            'dni' => $validated['dni'],
            'grado_academico' => $validated['grado_academico'],
            'voucher' => $voucherPath,
            'estado' => 'Pendiente',
        ]);

        return redirect()->route('inscripciones.success');
    }
}