<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    protected $fillable = ['nombre'];

    /**
     * Relacion uno a muchos con el modelo User
     */
    public function user()
    {
        return $this->hasMany('App\User', 'rol_id');
    }

    /**
     * Relacion uno a muchos con el modelo PrivilegiosDefault
     */
    public function privilegiosDefault()
    {
        return $this->hasMany('App\PrivilegiosDefault', 'rol_id');
    }


}
