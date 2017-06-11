<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VallaMenosVencida extends Model
{
    protected $table = 'vmenosvencida';
    protected $fillable = ['goles', 'torneo_id', 'equipo_id', 'user_id'];

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
            'goles' => 'required|integer',
            'equipo_id' => 'required|exists:equipo,id',
            'socio_id' => 'required|exists:socio,id',
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
}
