<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagoPublicoController;
use App\Http\Controllers\Admin\InscripcionAdminController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\PagoController;

Route::get('/', [InscripcionController::class, 'create'])->name('inicio');
Route::get('/inscripcion', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripciones.store');
Route::get('/inscripcion/exito', [InscripcionController::class, 'success'])->name('inscripciones.success');

Route::get('/consulta-pagos', [PagoPublicoController::class, 'form'])->name('pagos.consulta.form');
Route::post('/consulta-pagos', [PagoPublicoController::class, 'buscar'])->name('pagos.consulta.buscar');
Route::post('/consulta-pagos/{pago}/voucher', [PagoPublicoController::class, 'subirVoucher'])->name('pagos.consulta.subirVoucher');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/inscripciones', [InscripcionAdminController::class, 'index'])->name('admin.inscripciones.index');
    Route::patch('/admin/inscripciones/{inscripcion}/estado', [InscripcionAdminController::class, 'updateEstado'])->name('admin.inscripciones.updateEstado');
    Route::get('/admin/inscripciones/{inscripcion}/voucher', [InscripcionAdminController::class, 'showVoucher'])->name('admin.inscripciones.voucher');
    Route::delete('/admin/inscripciones/{inscripcion}', [InscripcionAdminController::class, 'destroy'])->name('admin.inscripciones.destroy');

    Route::get('/admin/alumnos', [AlumnoController::class, 'index'])->name('admin.alumnos.index');

    Route::get('/admin/pagos', [PagoController::class, 'index'])->name('admin.pagos.index');
    Route::get('/admin/pagos/{pago}/comprobante', [PagoController::class, 'showComprobante'])->name('admin.pagos.comprobante');
    Route::patch('/admin/pagos/{pago}', [PagoController::class, 'update'])->name('admin.pagos.update');
});

require __DIR__.'/auth.php';