<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;

class PagoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['inscripcion', 'pagos'])->latest()->get();

        return view('admin.pagos.index', compact('alumnos'));
    }
}