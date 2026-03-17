<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/run-migrations-secret', function () {
    abort_unless(
        request('key') && hash_equals(env('MIGRATION_SECRET', ''), request('key')),
        403
    );

    $output = [];

    try {
        Artisan::call('migrate:fresh', [
            '--database' => 'pgsql',
            '--force' => true,
        ]);
        $output['migrate_fresh'] = Artisan::output();

        Artisan::call('db:seed', [
            '--database' => 'pgsql',
            '--force' => true,
        ]);
        $output['seed'] = Artisan::output();

        Artisan::call('migrate:status', [
            '--database' => 'pgsql',
        ]);
        $output['status'] = Artisan::output();

        return response()->json([
            'ok' => true,
            'message' => 'Migraciones y seeders ejecutados.',
            'output' => $output,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'ok' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
});

require __DIR__.'/auth.php';