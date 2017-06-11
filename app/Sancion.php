<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    protected $table = 'sanciones';
    protected $fillable = ['infraccion', 'fecha', 'canfechas', 'desde', 'hasta', 'torneo_id', 'equipo_id', 'user_id'];

    public $errors;

    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'equipo_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'infraccion' => 'required',
            'fecha' => 'required',
            'canfechas' => 'required',
            'desde' => 'required',
            'hasta' => 'required',
            'equipo_id' => 'required|exists:equipo,id',
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
