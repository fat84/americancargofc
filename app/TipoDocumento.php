<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipodocumento';

    protected $fillable = ['nombre'];

    public function socio()
    {
        return $this->hasMany('App\Socio', 'tipodocumento_id');
    }
}
