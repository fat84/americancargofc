<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id', 'rol_id', 'activo', 'segdoblepaso', 'alertsesion' , 'email', 'password', 'estado',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $errors;

    /**    *********************** FUNCIONES QUE MODIFICAN PARAMETROS DEL MODELO *********************    */

    /**
     * Funcion que encripta el password
     */
    public function setPasswordAttribute ($pass)
    {
        if (! Empty($pass)) {
            $this->attributes['password'] = \Hash::make($pass);
        }
    }



    /**    *********************** FUNCIONES QUE RELACIONAN LA TABLA USERS CON OTRAS TABLAS *********************    */

    /**
     * Relacion de uno a uno con el modelo Persona
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    /**
     * Relacion de muchos a uno con el modelo Rol
     */
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    /**
     * Relacion uno a muchos con el modelo SesionesActivas
     */
    public function sesionesActivas()
    {
        return $this->hasMany('App\SesionesActivas', 'user_id');
    }

    /**
     * Relacion uno a muchos con el modelo UsuarioPrivilegios
     */
    public function usuarioPrivilegios()
    {
        return $this->hasMany('App\UsuarioPrivilegios', 'user_id');
    }

    /**
     * Relacion uno a uno con el modelo InfoClub
     */
    public function infoclub()
    {
        return $this->hasOne('App\InfoClub', 'user_id');
    }

    /**
     * Relacion uno a uno con el modelo InfoFamiliar
     */
    public function infofamiliar()
    {
        return $this->hasOne('App\InfoFamiliar', 'user_id');
    }

    /**
     * Relacion uno a uno con el modelo InfoLaboral
     */
    public function infolaboral()
    {
        return $this->hasOne('App\InfoLaboral', 'user_id');
    }

    /**
     * Relacion uno a uno con el modelo InfoLaboral
     */
    public function infosalud()
    {
        return $this->hasOne('App\InfoSalud', 'user_id');
    }



    /**    ****************** FUNCIONES QUE RETORNA INFORMACION PERSONALIZADA REQUERIDA ****************    */

    /**
     * Metodo que retorna todos los usuarios con informacion de la tabla users y personas
     * @param $query
     * @return mixed
     */
    public function scopeUsersPersonas($query, $request) {
        $forma = "ASC";

        if(is_null($request->orden) || $request->orden=="") {
            $request->orden = "apellido";
        }

        if($request->orden == "activo") {
            $forma = "DES";
        }

        return $query->select('*', 'users.id')
            ->join('personas', 'personas.id', '=', 'users.persona_id')
            ->where(\DB::raw("CONCAT(personas.nombre, ' ', personas.apellido)"), "LIKE", "%$request->search%" )
            ->where('users.id','!=',1)
            ->orderBy($request->orden, $forma);
    }

    public function scopeFiltroRol($query, $request){

        if($request->filtrorol!=""){
            $query->where('rol_id','=',$request->filtrorol);
        }
    }

    public function scopeFiltroEstado($query, $request){

        if($request->filtroestado!=""){
            $query->where('activo','=',$request->filtroestado);
        }
    }

    /**
     * Metodo que retorna un usuario con la informacion de tabla users y personas
     * @param $query
     * @return mixed
     */
    public function scopeUserPersona($query, $id){
        return $query->select('*', 'users.id')
            ->where('users.id', '=', $id)
            ->join('personas', 'personas.id', '=', 'users.persona_id');
    }

    /**
     * Metodo que retorna todos los usuarios con informacion de la tabla users y personas con respecto al nombre a buscar
     * @param $query
     * @return mixed
     */
    public function scopeSearchPersona($query, $nombre){
        return $query->select('*', 'users.id')
            ->join('personas', 'personas.id', '=', 'users.persona_id')
            ->where(\DB::raw("CONCAT(personas.nombre, ' ', personas.apellido)"), "LIKE", "%$nombre%" )
            ->orderBy('apellido', 'ASC');
    }




    /**    ****************** FUNCIONES QUE VALIDAN LA INFORMACION DESEADA ****************    */


    /**
     *  Metodo que valida la informacion para editar el usuario
     * @param $data
     * @return bool
     */
    public function isValidUpdateUser($request, $datos)
    {
        $rules = array(
            'identificacion' => 'required|unique:personas,identificacion|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|numeric',
            'barrio' => 'required',
            'direccion' => 'required',
            'foto' => 'image',
            'rol_id' => 'required|exists:rol,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|confirmed'
        );

        if ($request->identificacion == $datos['idenactual']) {
            //Evitamos que la regla “unique” tome en cuenta la identificacion del usuario actual
            $rules['identificacion'] = 'required|numeric';
        }
        if ($request->email == $datos['emailactual']) {
            //Evitamos que la regla “unique” tome en cuenta la identificacion del usuario actual
            $rules['email'] = 'required|email';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    /**
     * Metodo que valida la informacion para editar el perfil
     * @param $request
     * @param $datos
     * @return bool
     */
    public function isValidUpdatePerfil($request, $datos)
    {
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|numeric',
            'barrio' => 'required',
            'direccion' => 'required',
            'foto' => 'image',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|confirmed'
        );

        if ($request->email == $datos['emailactual']) {
            //Evitamos que la regla “unique” tome en cuenta la identificacion del usuario actual
            $rules['email'] = 'required|email';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }


}
