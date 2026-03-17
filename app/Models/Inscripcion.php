<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'nombres',
        'apellidos',
        'celular',
        'dni',
        'grado_academico',
        'voucher',
        'estado',
    ];

    public function alumno()
    {
        return $this->hasOne(Alumno::class);
    }
}