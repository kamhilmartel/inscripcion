<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

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
            'estado' => ['required', 'in:Pendiente,Validada,Observada'],
        ]);

        $inscripcion->update([
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.inscripciones.index')
            ->with('success', 'Estado actualizado correctamente.');
    }
}