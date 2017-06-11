<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLaboral extends Model
{
    protected $table = 'laboral';

    protected $fillable = ['profesion', 'gradoescolar', 'titulo', 'empresa', 'direccionempresa', 'telefonoempresa', 'celularempresa',
        'user_id'];
}
