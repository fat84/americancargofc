<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoClub extends Model
{
    protected $table = 'infopersonaclub';

    protected $fillable = ['numerosocio', 'numerocamiseta', 'nivel', 'posicion', 'lesionado', 'standby', 'standby_desde',
        'standby_hasta','cuotasostenimiento','tallacamiseta','tallapantaloneta','numcalzado','observaciones','tiposocio','activo','lesion','categoria','user_id'];

}
