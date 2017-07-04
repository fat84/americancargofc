<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Events\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

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
        } else {
            $eventos = Evento::orderBy('fecha','DESC')->get();
            return view('eventos.index',['eventos'=>$eventos]);
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
        return view('eventos.create');
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
        }else{
            $evento = new Evento($request->all());

            $img = $request->file('archivo');
            $file_route = time() . '_' . $img->getClientOriginalName();
            Storage::disk('eventos')->put($file_route, file_get_contents($img->getRealPath()));
            $evento->archivo = $file_route;
            if($evento->save()){
                return redirect('eventos')->with(['success'=>'Evento creado correctamente.']);
            }else{
                return redirect()->back()->with(['error'=>'No se ha podido crear el evento, intenta nuevamente']);
            }
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
        }else{
            $evento = Evento::find($id);
            return view('eventos.edit',['evento'=>$evento]);
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
    public function update(Request $request)
    {
        if(! $this->validarprivilegio('editar')) {
            return redirect()->back();
        }else{
            $evento = Evento::find($request->id);
            $evento->nombre = $request->nombre;
            $evento->fecha = $request->fecha;
            $img = $request->file('archivo');
            if($img!=null){
                Storage::delete('/galeria/imagenes/'.$evento->archivo);
                $file_route = time() . '_' . $img->getClientOriginalName();
                Storage::disk('eventos')->put($file_route, file_get_contents($img->getRealPath()));
                $evento->archivo = $file_route;
            }
            $evento->informacion = $request->informacion;
            return $evento->save() ? redirect('eventos')->with(['success'=>'Evento editado correctamente']) :
                redirect('eventos')->with(['error'=>'Evento editado correctamente']);

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
        }else{
            $evento = Evento::find($id);
            Storage::delete('/galeria/imagenes/'.$evento->archivo);
            if($evento->delete()){
                return redirect('eventos')->with(['success'=>'Evento eliminado']);
            }else{
                return redirect('eventos')->with(['error'=>'Evento no pudo ser eliminado']);
            }

        }


        //codigo
    }
}
