<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TEquipoJugador extends Model
{
    protected $table = 'tequipojugador';

    protected $fillable = ['tequipo_id', 'user_id'];

    public $errors;

    public function torneoequipo()
    {
        return $this->belongsTo('App\TorneoEquipo', 'tequipo_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function isValidregistro($request)
    {
        $rules = array(
            'user_id' => 'required|exists:users,id',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
