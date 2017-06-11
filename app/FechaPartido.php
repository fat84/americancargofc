<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaPartido extends Model
{
    protected $table = 'fechapartido';
    protected $fillable = ['fecha', 'hora', 'equipouno', 'golesuno', 'equipodos', 'golesdos', 'torneo_id', 'escenario_id', 'estado'];

    public $errors;

    /**
     * Relacion de muchos a uno con el modelo Torneo
     */
    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function equipoUno()
    {
        return $this->belongsTo('App\Equipo', 'equipouno');
    }

    public function equipoDos()
    {
        return $this->belongsTo('App\Equipo', 'equipodos');
    }

    public function escenario()
    {
        return $this->belongsTo('App\Escenario', 'escenario_id');
    }

    public function goleador()
    {
        return $this->hasMany('App\Goleador', 'fechapartido_id');
    }

    public function tarjetaroja()
    {
        return $this->hasMany('App\TarjetaRoja', 'fechapartido_id');
    }

    public function tarjetaamarilla()
    {
        return $this->hasMany('App\TarjetaAmarilla', 'fechapartido_id');
    }


    /**
     * Metodo que retorna todos las fechas de los partidos del torneo seleccionado
     * @param $query
     * @return mixed
     */
    public function scopeFechasTorneo($query, $torneoid) {

        return $query->where('tornedo_id',$torneoid);
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'fecha' => 'required|date',
            'hora' => 'required',
            'equipouno' => 'required',
            'golesuno' => 'integer',
            'equipodos' => 'required',
            'golesdos' => 'integer',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
