<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('inscripcion')->latest()->get();
        return view('admin.alumnos.index', compact('alumnos'));
    }
}