<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPrivilegios extends Model
{
    protected $table = 'usuario_privilegios';

    protected $fillable = ['user_id', 'privilegio_id', 'crear', 'eliminar', 'editar', 'consultar'];

    /**
     * Relacion de muchos a uno con el modelo User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relacion de muchos a uno con el modelo Privilegios
     */
    public function privilegio()
    {
        return $this->belongsTo('App\Privilegios');
    }

    public function nomn()
    {
        return 'dd';
    }

}
