<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SesionesActivas extends Model
{
    protected $table = 'sesiones_activas';

    protected $fillable = ['user_id', 'ip', 'so', 'navegador', 'codigosesion'];

    /**
     * Relacion de muchos a uno con el modelo User
     */
    public function rol()
    {
        return $this->belongsTo('App\User');
    }
}
