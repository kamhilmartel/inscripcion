<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'nombres',
        'apellidos',
        'celular',
        'email',
        'dni',
        'grado_academico',
        'voucher',
        'estado',
        'observacion',
    ];

    public function alumno()
    {
        return $this->hasOne(Alumno::class);
    }
}