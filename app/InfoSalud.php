<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoSalud extends Model
{
    protected $table = 'salud';

    protected $fillable = ['estatura', 'peso', 'imc', 'estadoimc', 'entidadsalud', 'riesgosprofesionales', 'tiposangre',
        'alergias','fracturas','user_id'];
}
