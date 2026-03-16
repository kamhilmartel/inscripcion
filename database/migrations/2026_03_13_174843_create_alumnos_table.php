<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcion_id')->unique()->constrained('inscripciones')->onDelete('cascade');
            $table->string('codigo')->nullable();
            $table->enum('estado_academico', ['Activo', 'Retirado', 'Finalizado'])->default('Activo');
            $table->enum('estado_financiero', ['Al día', 'Con deuda', 'Observado'])->default('Observado');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};