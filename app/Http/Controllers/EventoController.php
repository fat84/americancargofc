<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventoController extends Controller
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
            if ($privilegio->privilegio_id == 4 && $privilegio->$accion == 0) {
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

        //codigo
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

        //codigo
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

        //codigo
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

        //codigo
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! $this->validarprivilegio('eliminar')) {
            return redirect()->back();
        }

        //codigo
    }
}