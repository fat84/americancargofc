<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TorneoEquipo extends Model
{
    protected $table = 'torneoequipo';

    protected $fillable = ['torneo_id', 'equipo_id'];

    public $errors;

    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'equipo_id');
    }

    public function isValidregistro($request)
    {
        $rules = array(
            'equipo_id' => 'required|exists:equipo,id',
            'torneo_id' => 'required|exists:torneo,id',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
