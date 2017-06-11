<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = [
        'nombre',
    ];

    public $errors;

    /**
     * Relacion uno a muchos con el modelo ArchivosInforme
     */
    public function archivosInforme()
    {
        return $this->hasMany('App\ArchivosInforme', 'informe_id');
    }

    /**
     * Metodo que retorna todos los informes
     * @param $query
     * @return mixed
     */
    public function scopeInformes($query, $request) {

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
            'nombre' => 'required|unique:informes,nombre',
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
            'nombre' => 'required|unique:informes,nombre',
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
