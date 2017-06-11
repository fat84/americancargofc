<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Fixtury extends Model
{
    protected $table = 'fixtury';
    protected $fillable = ['archivo', 'torneo_id'];

    public $errors;

    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function setArchivoAttribute ($archivo)
    {
        if (! Empty($archivo)) {
            $nombre = $archivo->getClientOriginalName();
            $hora=date("his"); //obtenemos hora,minutos,segundos
            $ruta = public_path() .'/fixturyspdf/';
            $newnombre = $hora.$nombre;

            $this->attributes['archivo'] = 'fixturyspdf/'.$newnombre;
            Input::file('archivo')->move($ruta, $newnombre);
        }
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'archivo' => 'required|mimes:pdf,PDF',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
