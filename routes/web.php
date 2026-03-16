<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\InscripcionAdminController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\PagoController;

Route::get('/', [InscripcionController::class, 'create'])->name('inicio');
Route::get('/inscripcion', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripciones.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/inscripciones', [InscripcionAdminController::class, 'index'])->name('admin.inscripciones.index');
    Route::patch('/admin/inscripciones/{inscripcion}/estado', [InscripcionAdminController::class, 'updateEstado'])->name('admin.inscripciones.updateEstado');
    Route::get('/admin/alumnos', [AlumnoController::class, 'index'])->name('admin.alumnos.index');
    Route::get('/admin/pagos', [PagoController::class, 'index'])->name('admin.pagos.index');
});

require __DIR__.'/auth.php';