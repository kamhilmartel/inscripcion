<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Pago;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInscripciones = Inscripcion::count();
        $totalAlumnos = Alumno::count();
        $pagosPendientes = Pago::where('estado', 'Pendiente')->count();
        $pagosPagados = Pago::where('estado', 'Pagado')->count();

        return view('dashboard', compact(
            'totalInscripciones',
            'totalAlumnos',
            'pagosPendientes',
            'pagosPagados'
        ));
    }
}