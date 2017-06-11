<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
    protected $table = 'privilegios';

    protected $fillable = ['descripcion'];

    /**
     * Relacion uno a muchos con el modelo PrivilegiosDefault
     */
    public function privilegiosDefault()
    {
        return $this->hasMany('App\PrivilegiosDefault', 'privilegio_id');
    }

    /**
     * Relacion uno a muchos con el modelo UsuarioPrivilegios
     */
    public function usuarioPrivilegios()
    {
        return $this->hasMany('App\UsuarioPrivilegios', 'privilegio_id');
    }
}
