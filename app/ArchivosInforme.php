<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class ArchivosInforme extends Model
{
    protected $table = 'archivosinforme';

    protected $fillable = [
        'nombre', 'archivo', 'informe_id',
    ];

    public $errors;

    /**
     * Relacion de muchos a uno con el modelo Informe
     */
    public function informe()
    {
        return $this->belongsTo('App\Informe');
    }

    /**
     * Funcion que sube el arhivo del formulario
     */
    public function setArchivoAttribute ($archivo)
    {
        if (! Empty($archivo)) {
            $nombre = $archivo->getClientOriginalName();
            $hora=date("his"); //obtenemos hora,minutos,segundos
            $ruta = public_path() .'/pdf/informes/';
            $newnombre = $hora.$nombre;

            $this->attributes['archivo'] = 'pdf/informes/'.$newnombre;
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
            'nombre' => 'required|unique:archivosinforme,nombre',
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
