<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Informe;
use App\ArchivosInforme;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class IndexController extends Controller
{

    public function informes()
    {
        $informes = Informe::paginate(15);

        return view('index.informes')->with(['informes'=> $informes]);
    }

    public function archivosInforme($id)
    {
        $informe = Informe::find($id);

        if (is_null ($informe))
        {
            return redirect()->back()->withErrors('El informe No Existe');
        }

        $archivos = Informe::join('archivosinforme', 'archivosinforme.informe_id', '=','informes.id')
            ->where('archivosinforme.informe_id',$id)->paginate(15);

        return view('index.informearchivos')->with(['archivos'=> $archivos, 'nombreinforme' => $informe->nombre]);
    }

    public function indexDescargarArchivo($id)
    {

        $archivo = ArchivosInforme::find($id);

        if (is_null ($archivo))
        {
            return redirect()->back()->withErrors('El archivo No Existe');
        }

        return response()->download(public_path($archivo->archivo));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function indexEventos(){
        $eventos = Evento::where('fecha','>=',\date('Y-m-d H:m:s'))
            ->OrderBy('fecha','ASC')->paginate(1);
        return view('index.eventos')->with(['eventos'=> $eventos]);
    }
}
