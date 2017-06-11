<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = 'torneo';

    protected $fillable = ['nombre', 'fechaini', 'fechafin', 'visible'];

    public $errors;

    /**
     * Relacion uno a muchos con el modelo FechaPartido
     */
    public function fechaPartido()
    {
        return $this->hasMany('App\FechaPartido', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo Posiciones
     */
    public function posiciones()
    {
        return $this->hasMany('App\Posiciones', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo VMenosVencida
     */
    public function vmenosvencida()
    {
        return $this->hasMany('App\VallaMenosVencida', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo Goleador
     */
    public function goleador()
    {
        return $this->hasMany('App\Goleador', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo TarjetaRoja
     */
    public function tarjetaroja()
    {
        return $this->hasMany('App\TarjetasRojas', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo TarjetAamarilla
     */
    public function tarjetaamarilla()
    {
        return $this->hasMany('App\TarjetasAmarillas', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo Sanciones
     */
    public function sanciones()
    {
        return $this->hasMany('App\Sancion', 'torneo_id');
    }

    /**
     * Relacion uno a muchos con el modelo Fixtury
     */
    public function fixtury()
    {
        return $this->hasMany('App\Fixtury', 'torneo_id');
    }

    /**
     * Metodo que retorna todos los torneos
     * @param $query
     * @return mixed
     */
    public function scopeTorneos($query, $request) {

        return $query->where(\DB::raw("nombre"), "LIKE", "%$request->search%" );
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'nombre' => 'required|unique:torneo,nombre',
            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    /**
     *  Metodo que valida la informacion para editar
     * @param $data
     * @return bool
     */
    public function isValidUpdate($request, $datos)
    {
        $rules = array(
            'nombre' => 'required|unique:torneo,nombre',
            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        );

        if (strtolower($request->nombre) == strtolower($datos['nombreactual'])) {
            //Evitamos que la regla “unique” tome en cuenta el nombre actual
            $rules['nombre'] = 'required';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }


}
