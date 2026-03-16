<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('alumno.inscripcion')->latest()->get();

        return view('admin.pagos.index', compact('pagos'));
    }
}