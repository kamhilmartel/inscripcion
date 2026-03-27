<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Services\SupabaseStorageService;
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

    public function store(Request $request, SupabaseStorageService $storageService)
{
    $validated = $request->validate([
        'nombres' => ['required', 'string', 'max:120'],
        'apellidos' => ['required', 'string', 'max:120'],
        'celular' => ['required', 'string', 'max:20'],
        'dni' => ['required', 'digits:8', 'unique:inscripciones,dni'],
        'grado_academico' => ['required', 'in:Bachiller,Titulado'],
        'voucher' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:1024'],
    ]);

    try {
        $upload = $storageService->upload($request->file('voucher'), 'inscripciones');

        Inscripcion::create([
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'celular' => $validated['celular'],
            'dni' => $validated['dni'],
            'grado_academico' => $validated['grado_academico'],
            'voucher' => $upload['url'],
            'estado' => 'Pendiente',
        ]);

        return redirect()->route('inscripciones.success');
    } catch (\Throwable $e) {
        return back()->withErrors([
            'voucher' => 'Error al subir el voucher: ' . $e->getMessage()
        ])->withInput();
    }
}
}