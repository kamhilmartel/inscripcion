<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 120);
            $table->string('apellidos', 120);
            $table->string('celular', 20);
            $table->string('email')->nullable();
            $table->string('dni', 8)->unique();
            $table->enum('grado_academico', ['Bachiller', 'Titulado']);
            $table->string('voucher');
            $table->enum('estado', ['Pendiente', 'Validada', 'Observada'])->default('Pendiente');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};