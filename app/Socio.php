<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $table = 'socio';

    protected $fillable = ['nombre', 'apellido', 'identificacion', 'tipodocumento_id'];

    public $errors;

    ////////// relaciones con otros modelos

    public function goleador()
    {
        return $this->hasMany('App\Goleador', 'socio_id');
    }

    public function vMenosVencida()
    {
        return $this->hasMany('App\VMenosVencida', 'socio_id');
    }

    public function tarjetaRoja()
    {
        return $this->hasMany('App\TarjetaRoja', 'socio_id');
    }

    public function tarjetaAmarilla()
    {
        return $this->hasMany('App\TarjetaAmarilla', 'socio_id');
    }

    public function sanciones()
    {
        return $this->hasMany('App\Sanciones', 'socio_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo('App\TipoDocumento','tipodocumento_id');
    }

    public function scopeSocios($query, $request)
    {
        return $query->where(\DB::raw("CONCAT(nombre, ' ', apellido)"), "LIKE", "%$request->search%" )
            ->orderBy('apellido', 'ASC');
    }

    public function getFullNameAttribute()
    {
        return $this->nombre.' '.$this->apellido;
    }


    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required|unique:socio,identificacion',
            'tipodocumento_id' => 'required|exists:tipodocumento,id',
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
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required|unique:socio,identificacion',
            'tipodocumento_id' => 'required|exists:tipodocumento,id',
        );

        if ($request->identificacion == $datos['identificacionactual']) {
            //Evitamos que la regla “unique” tome en cuenta la identificacion del usuario actual
            $rules['identificacion'] = 'required';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }


}
