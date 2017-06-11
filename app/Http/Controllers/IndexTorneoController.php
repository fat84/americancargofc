<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\FechaPartido;
use App\Goleador;
use App\Posiciones;
use App\Sancion;
use App\TarjetasAmarillas;
use App\TarjetasRojas;
use App\TEquipoJugador;
use App\Torneo;
use App\VallaMenosVencida;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class IndexTorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $torneos = Torneo::where('visible','1')->orderBy('fechaini')->paginate(10);

        return view('indextorneo.torneos')->with(['torneos'=> $torneos]);
    }

    public function indexInfoTorneo($id){
        $torneo = Torneo::find($id);

        if (is_null ($torneo))
        {
            return redirect()->back()->withErrors('El Torneo No Existe');
        }

        Session::put('indexinfotorneo', $torneo);

        $informacion = FechaPartido::where('torneo_id',$torneo->id)->orderBy('fecha', 'ASC')->paginate(20);

        return view('indextorneo.fechaspartido', compact('informacion'));

    }

    public function indexFechasPartido()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = FechaPartido::where('torneo_id',session('indexinfotorneo')->id)->orderBy('fecha', 'ASC')->paginate(20);

            return view('indextorneo.fechaspartido', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function indexTablaPosiciones()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = Posiciones::where('torneo_id',session('indexinfotorneo')->id)->orderBy('pts', 'DESC')->paginate(20);

            return view('indextorneo.tablaposiciones', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function vallaMenosVencida()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = VallaMenosVencida::where('torneo_id',session('indexinfotorneo')->id)->orderBy('goles', 'ASC')->paginate(20);

            return view('indextorneo.vallamenosvencida', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function Goleadores()
    {
        if(session()->has('indexinfotorneo')) {

            //$informacion = Goleador::where('torneo_id',session('indexinfotorneo')->id)->orderBy('goles', 'DESC')->paginate(20);

            $informacion = Goleador::select(\DB::raw('sum(goleador.goles) as sumgoles, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','goleador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','goleador.equipo_id')
                ->where('goleador.torneo_id',session('indexinfotorneo')->id)
                ->where('goleador.autogol',0)
                ->groupBy('user_id')
                ->get();

            return view('indextorneo.goleadores', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function tarjetasRojas()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = TarjetasRojas::select(\DB::raw('sum(tarjetaroja.troja) as sumtroja, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaroja.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaroja.equipo_id')
                ->where('tarjetaroja.torneo_id',session('indexinfotorneo')->id)
                ->groupBy('tarjetaroja.user_id')
                ->get();

            return view('indextorneo.tarjetasrojas', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function tarjetasAmarillas()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = TarjetasAmarillas::select(\DB::raw('sum(tarjetaamarilla.tamarilla) as sumtamarilla, personas.nombre, personas.apellido, equipo.nombre as nombreequipo'))
                ->join('users','users.id','=','tarjetaamarilla.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->join('equipo','equipo.id','=','tarjetaamarilla.equipo_id')
                ->where('tarjetaamarilla.torneo_id',session('indexinfotorneo')->id)
                ->groupBy('tarjetaamarilla.user_id')
                ->get();

            return view('indextorneo.tarjetasamarillas', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function sanciones()
    {
        if(session()->has('indexinfotorneo')) {
            $informacion = Sancion::where('torneo_id',session('indexinfotorneo')->id)->orderBy('fecha', 'DESC')->paginate(20);

            return view('indextorneo.sanciones', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function fixtury()
    {
        if(session()->has('indexinfotorneo')) {
            return view('indextorneo.fixtury');
        }

        return redirect()->route('indextorneos');
    }

    public function indexDescargarFixtury()
    {
        if(session()->has('indexinfotorneo')) {
            return response()->download(public_path(session('indexinfotorneo')->fixtury->first()->archivo));
        }

        return redirect()->route('indextorneos');
    }

    public function indexInfoEquipo()
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = Equipo::select('equipo.*','torneoequipo.id as idtorneoequipo')
                ->join('torneoequipo','torneoequipo.equipo_id','=','equipo.id')
                ->where('torneoequipo.torneo_id',session('indexinfotorneo')->id)
                ->paginate(15);

            return view('indextorneo.indexequipostorneo', compact('informacion'));
        }

        return redirect()->route('indextorneos');
    }

    public function indexJuadoresEquipo($id)
    {
        if(session()->has('indexinfotorneo')) {

            $informacion = TEquipoJugador::select('personas.nombre','personas.apellido')
                ->join('users','users.id','=','tequipojugador.user_id')
                ->join('personas','personas.id','=','users.persona_id')
                ->where('tequipojugador.tequipo_id',$id)
                ->paginate(20);

            return view('indextorneo.indexjugadoresequipo', compact('informacion'));
        }

        return redirect()->route('indextorneos');
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
        //
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
        //
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
        //
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
}
