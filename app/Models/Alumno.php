<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'inscripcion_id',
        'codigo',
        'estado_academico',
        'estado_financiero',
        'observacion',
    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}