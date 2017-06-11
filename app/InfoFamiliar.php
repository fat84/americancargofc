<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoFamiliar extends Model
{
    protected $table = 'familiar';

    protected $fillable = ['nombrepadre', 'nombremadre', 'rolfamiliar', 'nombrefamiliar', 'profesionfamiliar', 'empresalaborafamiliar', 'telefonofamiliar',
        'numhijos','contactoemergencia','user_id'];

}
