<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Escenario;
use App\FechaPartido;
use App\Fixtury;
use App\Goleador;
use App\Persona;
use App\Posiciones;
use App\Sancion;
use App\Socio;
use App\TarjetasAmarillas;
use App\TarjetasRojas;
use App\TEquipoJugador;
use App\Torneo;
use App\TorneoEquipo;
use App\User;
use App\VallaMenosVencida;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TorneoController extends Controller
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
            if ($privilegio->privilegio_id == 6 && $privilegio->$accion == 0) {
                return false;
            }
        }
        return true;
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

        $torneos = Torneo::Torneos($request)->paginate(10);

        $contents = view('torneo.index')->with(['torneos'=> $torneos]);

        return $this->noCacheVista($contents);
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
    public function store(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $torneo = new Torneo();

            if(! $torneo->isValidregistro($request)) {
                Session::flash('error',$torneo->errors);
                return redirect()->back()->withInput();
            }

            $torneo->fill($request->all());

            $torneo->save();

            Session::flash('success', 'El torneo se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
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
        //
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

        $torneo = Torneo::find($id);

        if (is_null ($torneo))
        {
            return redirect()->back()->withErrors('El torneo No Existe');
        }

        $contents = view('torneo.edit')->with(['torneo'=> $torneo, 'form' => 'edit']);

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

        $torneo = Torneo::find($id);
        $datos = ['nombreactual' => $torneo->nombre];

        if($torneo->isValidUpdate($request, $datos)) {

            $torneo->fill($request->all());
            $torneo->save();

            Session::flash('success', 'El torneo se edito exitosamente');

            return redirect()->route('torneos');
        }
        else {
            Session::flash('error', $torneo->errors);
            return redirect()->route('torneos');
        }
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

    public function infoTorneo($id)
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        $torneo = Torneo::find($id);

        if (is_null ($torneo))
        {
            return redirect()->back()->withErrors('El torneo No Existe');
        }

        Session::put('infotorneo', $torneo);

        return redirect()->route('fechapartido');

    }

    //Inicio submenu fecha partido

    public function fechasPartido()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            $fechas = FechaPartido::where('torneo_id',session('infotorneo')->id)->orderBy('fecha', 'ASC')->paginate(18);

//            $equipos = Equipo::all()->lists('nombre','id')->toArray();
            $equipos = Equipo::select('equipo.*')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->get()->lists('nombre','id')->toArray();

            $escenarios = Escenario::all()->lists('nombre','id')->toArray();

            $contents = view('fechaspartido.index')->with(['fechas'=> $fechas,'equipos'=>$equipos,'escenarios'=>$escenarios]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeFechaEquipo(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $fechapartido = new FechaPartido();

            if(! $fechapartido->isValidregistro($request)) {
                Session::flash('error',$fechapartido->errors);
                return redirect()->back()->withInput();
            }

            $fechapartido->fill($request->all());
            $fechapartido->torneo_id = session('infotorneo')->id;
            $fechapartido->estado = 'Por Jugar';

            $fechapartido->save();

            Session::flash('success', 'La fecha se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function destroyFechaEquipo($id)
    {
        $fechapartido =FechaPartido::find($id);
        $fechapartido->delete();

        Session::flash('success', 'La fecha se elimino exitosamente');

        return redirect()->back();
    }

    public function golFechasPartido(Request $request)
    {
        $fechapartido = FechaPartido::find($request->fechapartido);

        $users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();

        /*$users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();*/

        $equipos = Equipo::select('equipo.nombre','equipo.id')
            ->where('equipo.id',$fechapartido->equipouno)
            ->orWhere('equipo.id',$fechapartido->equipodos)
            ->get();

        return response()->json([
            'users' => $users,
            'equipos' => $equipos,
        ]);
    }

    public function tAmarillaFechasPartido(Request $request)
    {
        $fechapartido = FechaPartido::find($request->fechapartido);

        $users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();

        /*$users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();*/

        return response()->json([
            'users' => $users,
        ]);
    }

    public function tRojaFechasPartido(Request $request)
    {
        $fechapartido = FechaPartido::find($request->fechapartido);

        $users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();

        /*$users = Persona::select('personas.nombre','personas.apellido','users.id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('tequipojugador','tequipojugador.user_id','=','users.id')
            ->join('torneoequipo','torneoequipo.id','=','tequipojugador.tequipo_id')
            ->where('torneoequipo.torneo_id',session('infotorneo')->id)
            ->where('torneoequipo.equipo_id',$fechapartido->equipouno)
            ->orWhere('torneoequipo.equipo_id',$fechapartido->equipodos)
            ->get();*/

        return response()->json([
            'users' => $users,
        ]);
    }

    //Fin submenu fecha partido


    //Inicio submenu tabla posiciones

    public function posiciones()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            $posiciones = Posiciones::where('torneo_id',session('infotorneo')->id)->orderBy('pts', 'DESC')->paginate(15);

            $equipos = Equipo::all()->lists('nombre','id')->toArray();

            $contents = view('posiciones.index')->with(['posiciones'=> $posiciones,'equipos'=>$equipos]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storePosicion(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $posicion = new Posiciones();

            if(! $posicion->isValidregistro($request)) {
                Session::flash('error',$posicion->errors);
                return redirect()->back()->withInput();
            }

            $posicion->fill($request->all());
            $posicion->torneo_id = session('infotorneo')->id;

            $posicion->save();

            Session::flash('success', 'La nueva posicion se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deletePosicion($id)
    {
        $posicion =Posiciones::find($id);
        $posicion->delete();

        Session::flash('success', 'La posicion se elimino exitosamente');

        return redirect()->back();
    }

    //Fin submenu tabla posiciones

    //Inicio submenu valla Menos Vencida

    public function vallaMenosVencida()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            $vmenosvencida = VallaMenosVencida::where('torneo_id',session('infotorneo')->id)->orderBy('goles', 'ASC')->paginate(15);

            $equipos = Equipo::all()->lists('nombre','id')->toArray();
            $socios = Socio::all()->lists('FullName','id')->toArray();

            $contents = view('vmenosvencida.index')->with(['vmenosvencida'=> $vmenosvencida,'equipos'=>$equipos,'socios'=>$socios]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeVMenosVencida(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $vmenosvencida = new VallaMenosVencida();

            if(! $vmenosvencida->isValidregistro($request)) {
                Session::flash('error',$vmenosvencida->errors);
                return redirect()->back()->withInput();
            }

            $vmenosvencida->fill($request->all());
            $vmenosvencida->torneo_id = session('infotorneo')->id;

            $vmenosvencida->save();

            Session::flash('success', 'Registro exitoso');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteVMenosVencida($id)
    {
        $vmenosvencida =VallaMenosVencida::find($id);
        $vmenosvencida->delete();

        Session::flash('success', 'Eliminacion exitosa');

        return redirect()->back();
    }

    //Fin submenu valla Menos Vencida

    //Inicio submenu valla Menos Vencida

    public function goleadores()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {

            /*$goleadores = Goleador::select(\DB::raw('sum(goleador.goles) as sumgoles, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','goleador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','goleador.equipo_id')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->join('tequipojugador','tequipojugador.tequipo_id','=','torneoequipo.id')
                ->where('goleador.torneo_id',session('infotorneo')->id)
                ->where('goleador.autogol',0)
                ->groupBy('goleador.user_id')
                ->orderBy('sumgoles','DESC')
                ->get();*/

            /*$goleadores = Goleador::select(\DB::raw('users.id, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','goleador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','goleador.equipo_id')
                ->where('torneo_id',session('infotorneo')->id)
                ->groupBy('user_id')
                ->get();*/

            $goleadores = Goleador::select(\DB::raw('sum(goleador.goles) as sumgoles, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','goleador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','goleador.equipo_id')
                ->where('goleador.torneo_id',session('infotorneo')->id)
                ->where('goleador.autogol',0)
                ->groupBy('user_id')
                ->get();

            //dd($goleadores);



            /* foreach ($goleadores as $u){
                $sum = Goleador::where('torneoequipo.torneo_id',session('infotorneo')->id)
                    ->where('autogol',0)
                    ->where('user_id',$u->user_id)
                    ->count();
                $u->sumgoles = $sum;
            }*/
            //dd($goleadores);
            $historialgoles = Goleador::select('goleador.*','personas.nombre','personas.apellido','fechapartido.fecha','fechapartido.hora','equipo.nombre as nombreequipo')
                ->join('fechapartido','fechapartido.id','=','goleador.fechapartido_id')
                ->join('users','users.id','=','goleador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','goleador.equipo_id')
                ->where('fechapartido.torneo_id',session('infotorneo')->id)
                ->orderBy('goleador.created_at','DESC')
                ->paginate(20);

            $contents = view('goleador.index')->with(['goleadores'=> $goleadores,'historialgoles'=>$historialgoles]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeGoleador(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $goleador = new Goleador();

            if(! $goleador->isValidregistro($request)) {
                Session::flash('error',$goleador->errors);
                return redirect()->back()->withInput();
            }

            $goleador->fill($request->all());
            $goleador->torneo_id = session('infotorneo')->id;
            $goleador->goles = 1;

            if(! isset($request->autogol)) {
                $goleador->autogol = 0;
            }

            $goleador->save();

            $fechapartido = FechaPartido::find($request->fechapartido_id);

            if($fechapartido->equipouno == $goleador->equipo_id){
                $fechapartido->golesdos = $fechapartido->golesdos + 1;
            }
            else {
                $fechapartido->golesuno = $fechapartido->golesuno + 1;
            }

            $fechapartido->save();

            Session::flash('success', 'Registro exitoso');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteGoleador($id)
    {
        $goleador =Goleador::find($id);

        $fechapartido = FechaPartido::find($goleador->fechapartido_id);

        if($fechapartido->equipouno == $goleador->equipo_id){
            $fechapartido->golesdos = $fechapartido->golesdos - 1;
        }
        else {
            $fechapartido->golesuno = $fechapartido->golesuno - 1;
        }
        $fechapartido->save();
        $goleador->delete();

        Session::flash('success', 'Eliminacion exitosa');

        return redirect()->back();
    }

    //Fin submenu valla Menos Vencida

    //Inicio submenu Tarjetas Rojas

    public function tarjetasRojas()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            //$trojas = TarjetasRojas::where('torneo_id',session('infotorneo')->id)->orderBy('troja', 'DESC')->paginate(15);

            /*$trojas = TarjetasRojas::select(\DB::raw('sum(tarjetaroja.troja) as sumtroja, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaroja.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaroja.equipo_id')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->join('tequipojugador','tequipojugador.tequipo_id','=','torneoequipo.id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->groupBy('tarjetaroja.user_id')
                ->orderBy('sumtroja','DESC')
                ->get();*/

            $trojas = TarjetasRojas::select(\DB::raw('sum(tarjetaroja.troja) as sumtroja, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaroja.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaroja.equipo_id')
                ->where('tarjetaroja.torneo_id',session('infotorneo')->id)
                ->groupBy('tarjetaroja.user_id')
                ->get();

            $historial = TarjetasRojas::select('tarjetaroja.*','personas.nombre','personas.apellido','fechapartido.fecha','fechapartido.hora','equipo.nombre as nombreequipo')
                ->join('fechapartido','fechapartido.id','=','tarjetaroja.fechapartido_id')
                ->join('users','users.id','=','tarjetaroja.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaroja.equipo_id')
                ->where('fechapartido.torneo_id',session('infotorneo')->id)
                ->orderBy('tarjetaroja.created_at','DESC')
                ->paginate(20);

            $contents = view('trojas.index')->with(['trojas'=> $trojas,'historial'=> $historial]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeTRoja(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $trojas = new TarjetasRojas();

            if(! $trojas->isValidregistro($request)) {
                Session::flash('error',$trojas->errors);
                return redirect()->back()->withInput();
            }

            $equipo = TorneoEquipo::select('torneoequipo.equipo_id')
                ->join('tequipojugador','torneoequipo.id','=','tequipojugador.tequipo_id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->where('tequipojugador.user_id', $request->user_id)
                ->first();

            $trojas->fill($request->all());
            $trojas->torneo_id = session('infotorneo')->id;
            $trojas->equipo_id = $equipo->equipo_id;
            $trojas->troja = 1;

            $trojas->save();

            Session::flash('success', 'Registro exitoso');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteTRoja($id)
    {
        $trojas =TarjetasRojas::find($id);
        $trojas->delete();

        Session::flash('success', 'Eliminacion exitosa');

        return redirect()->back();
    }

    //Fin submenu Tarjetas Rojas

    //Inicio submenu Tarjetas Amarillas

    public function tarjetasAmarillas()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            //$tamarillas = TarjetasAmarillas::where('torneo_id',session('infotorneo')->id)->orderBy('tamarilla', 'DESC')->paginate(15);

            /*$tamarillas = TarjetasAmarillas::select(\DB::raw('sum(tarjetaamarilla.tamarilla) as sumtamarilla, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaamarilla.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaamarilla.equipo_id')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->join('tequipojugador','tequipojugador.tequipo_id','=','torneoequipo.id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->groupBy('tarjetaamarilla.user_id')
                ->orderBy('sumtamarilla','DESC')
                ->get();*/

            $tamarillas = TarjetasAmarillas::select(\DB::raw('sum(tarjetaamarilla.tamarilla) as sumtamarilla, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaamarilla.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaamarilla.equipo_id')
                ->where('tarjetaamarilla.torneo_id',session('infotorneo')->id)
                ->groupBy('tarjetaamarilla.user_id')
                ->get();

            $historial = TarjetasAmarillas::select('tarjetaamarilla.*','personas.nombre','personas.apellido','fechapartido.fecha','fechapartido.hora','equipo.nombre as nombreequipo')
                ->join('fechapartido','fechapartido.id','=','tarjetaamarilla.fechapartido_id')
                ->join('users','users.id','=','tarjetaamarilla.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaamarilla.equipo_id')
                ->where('fechapartido.torneo_id',session('infotorneo')->id)
                ->orderBy('tarjetaamarilla.created_at','DESC')
                ->paginate(20);

            $contents = view('tamarillas.index')->with(['tamarillas'=> $tamarillas,'historial'=> $historial]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeTAmarilla(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $tamarillas = new TarjetasAmarillas();

            if(! $tamarillas->isValidregistro($request)) {
                Session::flash('error',$tamarillas->errors);
                return redirect()->back()->withInput();
            }

            $equipo = TorneoEquipo::select('torneoequipo.equipo_id')
                ->join('tequipojugador','torneoequipo.id','=','tequipojugador.tequipo_id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->where('tequipojugador.user_id', $request->user_id)
                ->first();

            $tamarillas->fill($request->all());
            $tamarillas->torneo_id = session('infotorneo')->id;
            $tamarillas->equipo_id = $equipo->equipo_id;
            $tamarillas->tamarilla = 1;

            $tamarillas->save();

            Session::flash('success', 'Registro exitoso');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteTAmarilla($id)
    {
        $tamarillas =TarjetasAmarillas::find($id);
        $tamarillas->delete();

        Session::flash('success', 'Eliminacion exitosa');

        return redirect()->back();
    }

    //Fin submenu Tarjetas Amarillas

    //Inicio submenu Sanciones

    public function sanciones()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            $sanciones = Sancion::where('torneo_id',session('infotorneo')->id)->orderBy('fecha', 'DESC')->paginate(15);

            $equipos = Equipo::all()->lists('nombre','id')->toArray();
            $socios = Socio::all()->lists('FullName','id')->toArray();

            $contents = view('sanciones.index')->with(['sanciones'=> $sanciones,'equipos'=>$equipos,'socios'=>$socios]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();

    }

    public function storeSancion(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $sanciones = new Sancion();

            if(! $sanciones->isValidregistro($request)) {
                Session::flash('error',$sanciones->errors);
                return redirect()->back()->withInput();
            }

            $sanciones->fill($request->all());
            $sanciones->torneo_id = session('infotorneo')->id;

            $sanciones->save();

            Session::flash('success', 'Registro exitoso');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteSancion($id)
    {
        $sanciones = Sancion::find($id);
        $sanciones->delete();

        Session::flash('success', 'Eliminacion exitosa');

        return redirect()->back();
    }

    //Fin submenu Sanciones

    //Inicio submenu fixturys
    public function fixturys()
    {
        if(! $this->validarprivilegio('consultar')) {
            return redirect()->back();
        }

        if(session()->has('infotorneo')) {
            $fixtury = Fixtury::where('torneo_id',session('infotorneo')->id)->get();

            $contents = view('fixturys.index')->with(['fixtury'=> $fixtury]);

            return $this->noCacheVista($contents);
        }

        return redirect()->back();
    }

    public function storeFixtury(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{
            if(! session()->has('infotorneo')) {
                return redirect()->back();
            }

            $fixtury = new Fixtury();

            if(! $fixtury->isValidregistro($request)) {
                Session::flash('error',$fixtury->errors);
                return redirect()->back()->withInput();
            }

            $fixtury->fill($request->all());
            $fixtury->torneo_id = session('infotorneo')->id;

            $fixtury->save();

            Session::flash('success', 'El fixturys se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function deleteFixtury($id)
    {
        if(! $this->validarprivilegio('eliminar')) {
            return redirect()->back();
        }

        $fixtury = Fixtury::find($id);

        //Verificamos que exista el archivo para eliminarlo
        if (! Empty($fixtury->archivo)) {
            if(Storage::exists($fixtury->archivo)){
                Storage::delete($fixtury->archivo);
            }
        }

        $fixtury->delete();

        return redirect()->back();
    }

    public function descargarFixtury($id)
    {
        if(! session()->has('infotorneo')) {
            return redirect()->back();
        }

        $fixtury = Fixtury::find($id);
        if (is_null ($fixtury))
        {
            return redirect()->back()->withErrors('El fixturys No Existe');
        }
        return response()->download(public_path($fixtury->archivo));
    }

    //Fin submenu fixturys


    public function equiposTorneo()
    {
        $equipos = Equipo::select('equipo.*','torneoequipo.id as idtorneoequipo')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->where('torneoequipo.torneo_id',session('infotorneo')->id)
                ->paginate(15);

        $contents = view('equipotorneo.index')->with(['equipos'=> $equipos]);

        return $this->noCacheVista($contents);
    }

    public function storeEquipoTorneo(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{
            if(! session()->has('infotorneo')) {
                return redirect()->back();
            }

            if($request->nombre == "") {
                Session::flash('simpleerror','Debes indicar un nombre de equipo');
                return redirect()->back()->withInput();
            }

            $equipo = new Equipo();
            $equipo->nombre = $request->nombre;
            $equipo->save();

            $torneoequipo = new TorneoEquipo();
            $torneoequipo->equipo_id = $equipo->id;
            $torneoequipo->torneo_id = session('infotorneo')->id;
            $torneoequipo->save();

            Session::flash('success', 'El equipo se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function editEquipoTorneo($id)
    {
        $equipo = Equipo::find($id);
        $contents = view('equipotorneo.edit')->with(['equipo'=> $equipo]);

        return $this->noCacheVista($contents);
    }

    public function updateEquipoTorneo(Request $request, $id)
    {
        if(! $this->validarprivilegio('editar')) {
            return redirect()->back();
        }

        if($request->nombre == "") {
            Session::flash('simpleerror','Debes indicar un nombre de equipo');
            return redirect()->back()->withInput();
        }

        $equipo = Equipo::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->save();

        Session::flash('success', 'El equipo se edito exitosamente');

        return redirect('equipostorneo');
    }

    public function getJugadoresEquipo($id)
    {
        $jugadores = TEquipoJugador::select('personas.nombre','personas.apellido', 'users.id as iduser', 'tequipojugador.id as tejid')
            ->join('users','users.id','=','tequipojugador.user_id')
            ->join('personas','personas.id','=','users.persona_id')
            ->where('tequipojugador.tequipo_id',$id)
            ->paginate(15);

        $socios = User::select( 'personas.nombre', 'personas.apellido', 'users.id')
            ->join('personas','personas.id','=','users.persona_id')
            ->where('users.id','!=','1')
            ->where('users.id','!=','10')
            ->get();

        $contents = view('equipotorneo.jugadores')->with(['jugadores'=> $jugadores, 'idtorneoequipo'=> $id, 'socios'=> $socios]);

        return $this->noCacheVista($contents);
    }

    public function setJugadorEquipo(Request $request, $id)
    {
        $existe = TEquipoJugador::where('tequipo_id',$id)->where('user_id',$request->user_id)->count();

        if($existe > 0){
            Session::flash('simpleerror','El jugador ya existe en este equipo');
            return redirect()->back();
        }
        $tequipojugador = new TEquipoJugador();
        $tequipojugador->tequipo_id = $id;
        $tequipojugador->user_id = $request->user_id;
        $tequipojugador->save();

        Session::flash('success', 'El jugador se registro exitosamente');

        return redirect()->back();
    }

    public function deleteJugadorEquipo($id)
    {
        $tequipojugador = TEquipoJugador::find($id);
        $tequipojugador->delete();

        Session::flash('success', 'El jugador se elimino exitosamente');

        return redirect()->back();
    }
}
