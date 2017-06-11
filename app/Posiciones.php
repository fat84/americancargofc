<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posiciones extends Model
{
    protected $table = 'posiciones';
    protected $fillable = ['pj', 'pg', 'pe', 'pp', 'gf', 'gc', 'dg', 'pts', 'torneo_id', 'equipo_id'];

    public $errors;

    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'equipo_id');
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'pj' => 'required|integer',
            'pg' => 'required|integer',
            'pe' => 'required|integer',
            'pp' => 'required|integer',
            'gf' => 'required|integer',
            'gc' => 'required|integer',
            'dg' => 'required|integer',
            'pts' => 'required|integer',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
