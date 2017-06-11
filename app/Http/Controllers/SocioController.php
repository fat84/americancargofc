<?php

namespace App\Http\Controllers;

use App\Socio;
use App\TipoDocumento;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;

class SocioController extends Controller
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
            if ($privilegio->privilegio_id == 7 && $privilegio->$accion == 0) {
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

        $socios = Socio::Socios($request)->paginate(20);
        $tiposidenticacion = TipoDocumento::all()->lists('nombre','id')->toArray();

        $contents = view('socio.index')->with(['socios'=> $socios, 'tiposidenticacion'=> $tiposidenticacion]);

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

            $socio = new Socio();

            if(! $socio->isValidregistro($request)) {
                Session::flash('error',$socio->errors);
                return redirect()->back()->withInput();
            }

            $socio->fill($request->all());

            $socio->save();

            Session::flash('success', 'El nuevo socio se registro exitosamente');

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

        $socio = Socio::find($id);

        if (is_null ($socio))
        {
            return redirect()->back()->withErrors('El socio No Existe');
        }

        $tiposidenticacion = TipoDocumento::all()->lists('nombre','id')->toArray();

        $contents = view('socio.edit')->with(['socio'=> $socio, 'form' => 'edit','tiposidenticacion'=> $tiposidenticacion]);

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

        $socio = Socio::find($id);
        $datos = ['identificacionactual' => $socio->identificacion];

        if($socio->isValidUpdate($request, $datos)) {

            $socio->fill($request->all());
            $socio->save();

            Session::flash('success', 'El socio se edito exitosamente');

            return redirect()->route('socios');
        }
        else {
            Session::flash('error', $socio->errors);
            return redirect()->route('socios');
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
}
