<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    protected $table = 'escenario';
    protected $fillable = ['nombre', 'direccion'];

    public $errors;

    public function fechapartido()
    {
        return $this->hasMany('App\FechaPartido', 'escenario_id');
    }

    /**
     *  Metodo que valida la informacion para el registro
     * @param $data
     * @return bool
     */
    public function isValidregistro($request)
    {
        $rules = array(
            'nombre' => 'required|unique:escenario,nombre',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
