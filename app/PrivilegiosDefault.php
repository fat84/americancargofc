<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivilegiosDefault extends Model
{
    protected $table = 'privilegios_default';

    protected $fillable = ['rol_id', 'privilegio_id', 'crear', 'eliminar', 'editar', 'consultar'];

    /**
     * Relacion de muchos a uno con el modelo Rol
     */
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    /**
     * Relacion de muchos a uno con el modelo Privilegios
     */
    public function privilegios()
    {
        return $this->belongsTo('App\Privilegios');
    }
}
