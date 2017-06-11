<?php

namespace App\Http\Controllers;

use App\InfoClub;
use App\InfoFamiliar;
use App\InfoLaboral;
use App\InfoSalud;
use App\Persona;
use App\SesionesActivas;
use Illuminate\Http\Request;
use Chumper\Zipper\Zipper;

use App\Http\Requests;
use App\User;
use App\Rol;
use App\Http\Requests\Usuario\CrearUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Session;
use App\PrivilegiosDefault;
use App\UsuarioPrivilegios;
use Illuminate\Support\Facades\Storage;
use App\Privilegios;
use Illuminate\Support\Facades\Auth;
use Response;
use Hash;


class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Verifica si tiene privilegios, retorna false si el privilegio a consultar no esta activo (0)
     * @param $accion
     * @return bool
     */
    private function validarprivilegio($accion)
    { //$accion puede solo ser crear, eliminar, editar, consultar,
        foreach(session('allprivilegios') as $privilegio) {
            if ($privilegio->privilegio_id == 1 && $privilegio->$accion == 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        $users = User::UsersPersonas($request)->FiltroRol($request)->FiltroEstado($request)->paginate(10);
        $roles = Rol::all()->lists('nombre','id')->toArray();

        $contents = view('usuarios.index')->with(['users'=> $users, 'roles' => $roles]);

        return $this->noCacheVista($contents);
    }

    public function pdfUsuarios(Request $request)
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        ///// Borra archivos que tengan dos o mas dias de creado
        $files = Storage::files('pdf/usuarios');
        foreach($files as $file){
            $time = Storage::lastModified($file);
            $f1 = date("d/m/Y", $time);
            $f2 = date("d/m/Y", time());

            $dias = $f2-$f1;

            if($dias>1){
                Storage::delete($file);
            }
        }

        ///// Consulta los usuarios
        $usersall = User::UsersPersonas($request)->FiltroRol($request)->FiltroEstado($request)->get();

        $path = public_path() . '/pdf/usuarios/';
        $numero = mt_rand(1000, 9999);
        $i =0 ;
        $a = $usersall->chunk(500);

        // Crear los archivos que seran comprimidos
        foreach($a as $users){
            $view =  \View::make('usuarios.pdf.pdf', compact('users'))->render();
            file_put_contents($path.'user'.$numero.$i.'.html', $view);
            $i = $i+1;
        }

        // Crea el .zip
        $zipper = new Zipper();
        $zipper->make($path.'users'.$numero.'.zip');

        for($j=0 ; $j<$i; $j++){
            $zipper->add($path.'user'.$numero.$j.'.html');
        }
        $zipper->close();

        // Elimina los archivos que se comprimieron .html
        for($j=0 ; $j<$i; $j++){
            if(Storage::exists('pdf/usuarios/user'.$numero.$j.'.html')){
                Storage::delete('pdf/usuarios/user'.$numero.$j.'.html');
            }
        }

        return response()->download($path.'users'.$numero.'.zip');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearUsuarioRequest $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $persona = new Persona();
            $persona->fill($request->all());

            //Guarda los datos en la tabla persona
            $persona->save();

            $user = new User();
            $user->fill($request->all());
            $user->persona_id = $persona->id;
            $user->save();

            //Asignamos los privilegio default que tiene el rol seleccionado
            $this->asignarPrivilegios($user->id, $user->rol_id);

            $infoclub = new InfoClub();
            $infoclub->fill($request->all());
            $infoclub->user_id = $user->id;
            $infoclub->save();

            $infofamiliar = new InfoFamiliar();
            $infofamiliar->fill($request->all());
            $infofamiliar->user_id = $user->id;
            $infofamiliar->save();

            $infolaboral = new InfoLaboral();
            $infolaboral->fill($request->all());
            $infolaboral->user_id = $user->id;
            $infolaboral->save();

            $infosalud = new InfoSalud();
            $infosalud->fill($request->all());
            $infosalud->user_id = $user->id;
            $infosalud->save();

            Session::flash('success', 'El usuario se registro exitosamente.');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors("Se ha generado un error, por favor intente más tarde o contacte al administrador <<<".$e.">>>");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        $user = User::find($id);
        if (is_null ($user))
        {
            return redirect()->back()->withErrors('El Usuario No Existe');
        }
        $persona = $user->persona;
        $club = $user->infoclub;
        $familiar = $user->infofamiliar;
        $laboral = $user->infolaboral;
        $salud = $user->infosalud;

        $contents = view('usuarios.show')->with(['user'=> $user, 'persona' => $persona, 'club' => $club, 'familiar' => $familiar, 'laboral' => $laboral, 'salud' => $salud, 'form' => 'show']);

        return $this->noCacheVista($contents);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! $this->validarprivilegio('editar')) {
            return redirect()->back();
        }

        $user = User::find($id);
        if (is_null ($user))
        {
            return redirect()->back()->withErrors('El Usuario No Existe');
        }

        $roles = Rol::all()->lists('nombre','id')->toArray();
        $persona = $user->persona;
        $club = $user->infoclub;
        $familiar = $user->infofamiliar;
        $laboral = $user->infolaboral;
        $salud = $user->infosalud;

        $contents = view('usuarios.edit')->with(['user'=> $user, 'roles' => $roles, 'persona' => $persona, 'club' => $club, 'familiar' => $familiar, 'laboral' => $laboral, 'salud' => $salud, 'form' => 'edit']);

        return $this->noCacheVista($contents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(! $this->validarprivilegio('editar')) {
            return redirect()->back();
        }

        $user = User::find($id);
        $datos = ['idenactual' => $user->persona->identificacion, 'emailactual' => $user->email];

        if($user->isValidUpdateUser($request, $datos)) {
            if($this->actualizarInformacionUsuario($request, $user, 'updateuser')) {

                $infoclub = $user->infoclub;
                $infoclub->fill($request->all());
                $infoclub->save();

                $infofamiliar = $user->infofamiliar;
                $infofamiliar->fill($request->all());
                $infofamiliar->save();

                $infolaboral = $user->infolaboral;
                $infolaboral->fill($request->all());
                $infolaboral->save();

                $infosalud = $user->infosalud;
                $infosalud->fill($request->all());
                $infosalud->save();

                Session::flash('success', 'El usuario se edito exitosamente');

                return redirect()->route('usuario');
            }
            Session::flash('warning', 'El usuario no pudo ser editado por favor intentelo de nuevo');

            return redirect()->route('usuario');
        }
        else {
            Session::flash('error', $user->errors);
            return $this->edit($id);
        }
    }

    private function actualizarInformacionUsuario($request, $user, $funcion){
        //$funtion puede ser updateuser o updateperfil

        if($funcion == 'updateuser') {
            if ($user->rol_id != $request->rol_id) {
                $this->asignarPrivilegios($user->id, $request->rol_id);
            }

            $user->fill($request->all());

            if(! isset($request->activo)) {
                $user->activo = 0;
            }
        }
        else if($funcion == 'updateperfil') {
            $user->fill($request->except('rol_id', 'activo'));
        }

        if(! isset($request->segdoblepaso)) {
            $user->segdoblepaso = 0;
        }
        if(! isset($request->alertsesion)) {
            $user->alertsesion = 0;
        }

        $user->save(); //guardamos los cambios del usuario en la tabla users

        $persona = Persona::find($user->persona_id);

        if (! Empty($request->foto)) {
            //Verificamos que exista la foto actual del usuario para eliminarla
            if (! Empty($persona->foto) && $persona->foto != 'img/usuarios/default.png') {
                if(Storage::exists($persona->foto)){
                    Storage::delete($persona->foto);
                }
            }
        }
        if($funcion == 'updateuser') {
            $persona->fill($request->all());
        }
        else if($funcion == 'updateperfil') {
            $persona->fill($request->except('identificacion'));
        }
        $persona->save();

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Asigna privilegios por default del tipo de usuario, al id del usuario dado
     */
    private function asignarPrivilegios($user_id, $rol_id)
    {
        //se busca los privilegios por default del tipo de usuario del formulario
        $privilegios_default = Rol::find($rol_id)->privilegiosDefault;

        //registro de datos de privilegios en la tabla usuario_privilegios
        foreach($privilegios_default as $privilegio) {
            $userprivilegio = UsuarioPrivilegios::firstOrNew(['user_id' => $user_id, 'privilegio_id' => $privilegio->privilegio_id]);
            $userprivilegio->crear = $privilegio->crear;
            $userprivilegio->eliminar = $privilegio->eliminar;
            $userprivilegio->editar = $privilegio->editar;
            $userprivilegio->consultar = $privilegio->consultar;
            $userprivilegio->save();
        }
    }

    /**
     * Metodo que retorna a la vista todos los privilegios en el sistema y los privilegios que tiene el usuario dado por el id
     */
    public function privilegiosUsuario($id)
    {
        //Buscamos todos los privilegios del sistema
        $allprivilegios = Privilegios::all();

        //Buscamos los privilegios que posee el usuario del id
        $user = User::find($id);
        $userprivilegios = $user->usuarioPrivilegios;

        $contents = view('usuarios.privilegios')->with(['allprivilegios' => $allprivilegios, 'user'=> $user, 'userprivilegios' => $userprivilegios]);

        return $this->noCacheVista($contents);
    }

    /**
     * Metodo que guarda en la BD los privilegios modificados al usuario dado por el id
     */
    public function updatePrivilegiosUsuario(Request $request, $id)
    {
        if(! $this->validarprivilegio('editar')) {
            return redirect()->back();
        }

        //Buscamos todos los privilegios del sistema
        $privilegios = Privilegios::all();

        $datos = $request->all();

        foreach($privilegios as $privilegio) {

            $priuser = UsuarioPrivilegios::firstOrNew(['user_id' => $id, 'privilegio_id' => $privilegio->id]);

            $priuser->crear = 0;
            $priuser->editar = 0;
            $priuser->eliminar = 0;
            $priuser->consultar = 0;

            $idpri = $privilegio->id;

            //se ingresan los datos que lleguen desde la interfaz al objeto priuser
            if(isset($datos[$idpri.'crear'])){
                $priuser->crear = $datos[$idpri.'crear'];
            }
            if(isset($datos[$idpri.'editar'])){
                $priuser->editar = $datos[$idpri.'editar'];
            }
            if(isset($datos[$idpri.'eliminar'])){
                $priuser->eliminar = $datos[$idpri.'eliminar'];
            }
            if(isset($datos[$idpri.'consultar'])){
                $priuser->consultar = $datos[$idpri.'consultar'];
            }

            $priuser->save();
        }

        Session::flash('success', 'Se asignaron exitosamente los privilegios');

        return redirect()->route('usuario');
    }


    /**
     * Metodo que retorna la vista dashboard apenas inicie sesion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $contents = view('layouts.dashboard');
        return $this->noCacheVista($contents);
    }

    /**
     * Metodo que no permite que se guarde la vista en la cache del navegador
     */
    public function noCacheVista($contents)
    {
        $response = Response::make($contents, 200);
        $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $response->header('Pragma', 'no-cache');

        return $response;
    }

    /** METODOS DEL PERFIL USUARIO */

    /** Metodo que retorna la vista del perfil con las sesiones activas
     * @return mixed
     */
    public function perfil()
    {
        $user = User::find(Auth::user()->id);
        $persona = $user->persona;

        $seactiva = new SesionActivaController();
        $sesiones = $seactiva->allSession();

        $contents = view('usuarios.perfil')->with(['user'=> $user, 'persona' => $persona, 'form' => 'perfil', 'sesiones' => $sesiones]);

        return $this->noCacheVista($contents);
    }

    /** Metodo que nos retorna a la vista de edicion de datos del perfil
     * @return mixed
     */
    public function editarPerfil()
    {
        $user = User::find(Auth::user()->id);
        $persona = $user->persona;

        $contents = view('usuarios.editarperfil')->with(['user'=> $user, 'persona' => $persona, 'form' => 'editarperfil']);

        return $this->noCacheVista($contents);
    }

    /** Metodo que actualiza la informacion del perfil en la BD
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePerfil(Request $request){
        $user = User::find(Auth::user()->id);

        if($request->passwordactual != '' || $request->password != ''|| $request->password_confirmation != '') {
            if($request->passwordactual == '') {
                Session::flash('simpleerror', 'Debes completar el campo Password Actual si desea completar el cambio de tu password');
                return $this->editarPerfil(Auth::user()->id);
            }
            if($request->password == '') {
                Session::flash('simpleerror', 'Debes completar el campo Nueva Password si desea completar el cambio de tu password');
                return $this->editarPerfil(Auth::user()->id);
            }
            if($request->password_confirmation == '') {
                Session::flash('simpleerror', 'Debes completar el campo Repetir Nueva Password si desea completar el cambio de tu password');
                return $this->editarPerfil(Auth::user()->id);
            }
            if (Hash::check($request->passwordactual, $user->password)) {
                if($request->passwordactual == $request->password) {
                    Session::flash('simpleerror', 'El Nuevo Password debe ser diferente al actual');
                    return $this->editarPerfil(Auth::user()->id);
                }
            }
            else{
                Session::flash('simpleerror', 'El Password Actual No Es Correcto');
                return $this->editarPerfil(Auth::user()->id);
            }
        }

        $datos = ['emailactual' => $user->email];
        if($user->isValidUpdatePerfil($request, $datos)) {
            if($this->actualizarInformacionUsuario($request, $user, 'updateperfil')){
                Session::flash('success', 'Los Datos Fueron Guardados Con Exito!');

                return redirect()->route('perfil');
            }
            Session::flash('warning', 'Hubo Un Problema Por Favor Intentelo De Nuevo');

            return redirect()->route('perfil');
        }
        else {
            Session::flash('error', $user->errors);
            return $this->editarPerfil(Auth::user()->id);
        }
    }

    /** Metodo que borra la informacion de la fila correspondiente al codigo de sesion dado de la tabla sesiones_activas
     * @param $codsesion
     */
    public function destroySesion($codsesion, Request $request){

        $seactiva = SesionesActivas::where('codigosesion', '=', $codsesion)
                    ->where('user_id','=',Auth::user()->id)
                    ->first();
        if(isset($seactiva)) {
            $seactiva->delete();

            if(\Request::ajax()) {
               return "exito";
            }

            Session::flash('success', 'Se Cerro La Sesion Con Exito!');
        }
        else{
            Session::flash('warning', 'No Se Encontro La Sesion');
        }

        return redirect()->route('perfil');
    }

    public function eliminarFotoPerfil()
    {
        $user = User::find(Auth::user()->id);
        $foto = $user->persona->foto;
        if (! Empty($foto) && $foto != 'img/usuarios/default.png') {
            if(Storage::exists($foto)){
                Storage::delete($foto);
                $persona = Persona::find($user->persona_id);
                $persona->foto = 'img/usuarios/default.png';
                $persona->save();

                return redirect()->route('perfil');
            }
        }
        return redirect()->route('perfil');
    }



    /** METODOS QUE SE USARAN PARA LA SEGURIDAD DOBLE PASO */



    public function getSegdoblepaso()
    {   //session()->forget('confirmacion');
        if(session()->has('confirmacion')) {
            if(session('confirmacion') != '') {
                $contents = view('layouts.segdoblepaso');
                return $this->noCacheVista($contents);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function postSegdoblepaso(Request $request)
    {
        if(session()->has('confirmacion')) {
            if(session('confirmacion') != '' && session('cantconfirmacion') < 5) {
                if(session('confirmacion') == $request->confirmacion) {
                    session()->forget('confirmacion');
                    session()->forget('cantconfirmacion');
                    return redirect('dashboard');
                }
                session(['cantconfirmacion' => session('cantconfirmacion') + 1]);
                return redirect()->back()->withErrors('Codigo de confirmación incorrecto');
            }
            session()->forget('confirmacion');
            session()->forget('cantconfirmacion');
            return redirect('logout');
        }
        return redirect()->back();
    }





    /** METODOS QUE SE USARAN PARA AGREGAR LOS PRIVIELGIOS DEFAULT DE CADA ROL
     ** esto lo tiene que hacer unicamente el encargado de instalar el modulo de privilegios
     */


    /**
     * Metodo que envia a la vista los diferentes roles para asignar los privilegios default
     */
    public function defaultPrivilegiosRol()
    {
        $roles = Rol::all();

        $contents = view('usuarios.default.roles')->with(['roles' => $roles]);

        return $this->noCacheVista($contents);
    }

    /**
     * Metodo que retorna a la vista los privilegios default del rol dado por el id
     * $id = id del rol
     */
    public function showPrivilegioDefaultRol($id)
    {
        $rol = Rol::find($id);

        $allprivilegios = Privilegios::all();

        $rolprivilegios = $rol->privilegiosDefault;

        $contents = view('usuarios.default.rolprivilegios')->with(['allprivilegios' => $allprivilegios, 'rol'=> $rol, 'rolprivilegios' => $rolprivilegios]);

        return $this->noCacheVista($contents);
    }

    /**
     * Metodo que asigna los privilegios default al rol seleccionado
     * $id = el id del rol
     */
    public function updatePrivilegiosDefault(Request $request, $id)
    {
        $privilegios = Privilegios::all();
        $datos = $request->all();

        foreach($privilegios as $privilegio) {

            $pridefault = PrivilegiosDefault::firstOrNew(['rol_id' => $id, 'privilegio_id' => $privilegio->id]);

            $pridefault->crear = 0;
            $pridefault->editar = 0;
            $pridefault->eliminar = 0;
            $pridefault->consultar = 0;

            $idpri = $privilegio->id;

            //se ingresan los datos que lleguen desde la interfaz al objeto pridefault
            if(isset($datos[$idpri.'crear'])){
                $pridefault->crear = $datos[$idpri.'crear'];
            }
            if(isset($datos[$idpri.'editar'])){
                $pridefault->editar = $datos[$idpri.'editar'];
            }
            if(isset($datos[$idpri.'eliminar'])){
                $pridefault->eliminar = $datos[$idpri.'eliminar'];
            }
            if(isset($datos[$idpri.'consultar'])){
                $pridefault->consultar = $datos[$idpri.'consultar'];
            }

            $pridefault->save();
        }

        Session::flash('success', 'Se asignaron exitosamente los privilegios');

        return redirect()->route('defaultprivilegios');
    }


}