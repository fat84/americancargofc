<?php

namespace App\Http\Controllers;

use App\ArchivosInforme;
use App\Informe;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InformeController extends Controller
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
            if ($privilegio->privilegio_id == 3 && $privilegio->$accion == 0) {
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

        $informes = Informe::Informes($request)->paginate(10);

        $contents = view('informe.index')->with(['informes'=> $informes]);

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

            $informes = new Informe();

            if(! $informes->isValidregistro($request)) {
                Session::flash('error',$informes->errors);
                return redirect()->back()->withInput();
            }

            $informes->fill($request->all());

            $informes->save();

            Session::flash('success', 'El informe se registro exitosamente');

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

        $informe = Informe::find($id);

        if (is_null ($informe))
        {
            return redirect()->back()->withErrors('El informe No Existe');
        }

        $contents = view('informe.edit')->with(['informe'=> $informe, 'form' => 'edit']);

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

        $informe = Informe::find($id);
        $datos = ['nombreactual' => $informe->nombre];

        if($informe->isValidUpdate($request, $datos)) {

            $informe->fill($request->all());
            $informe->save();

            Session::flash('success', 'El informe se edito exitosamente');

            return redirect()->route('informe');
        }
        else {
            Session::flash('error', $informe->errors);
            return redirect()->route('informe');
        }
    }

    public function getArchivos(Request $request, $id)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        if (is_null ($id))
        {
            return redirect()->back()->withErrors('El informe No Existe');
        }

        $archivos = Informe::join('archivosinforme', 'archivosinforme.informe_id', '=','informes.id')
            ->where('archivosinforme.informe_id',$id)->paginate(15);

        $contents = view('informe.archivo')->with(['archivos'=> $archivos, 'informeid' => $id]);

        return $this->noCacheVista($contents);
    }

    public function storeArchivo(Request $request, $id)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        try{

            $archivo = new ArchivosInforme();

            if(! $archivo->isValidregistro($request)) {
                Session::flash('error',$archivo->errors);
                return redirect()->back()->withInput();
            }

            $archivo->fill($request->all());
            $archivo->informe_id = $id;

            $archivo->save();

            Session::flash('success', 'El archivo se registro exitosamente');

            return redirect()->back();

        }catch (Exception $e) {

            return redirect()->back()->withErrors('Se ha generado un error, por favor intente más tarde o contacte al administrador <<<'.$e.'>>>');
        }
    }

    public function descargarArchivo($id)
    {

        $archivo = ArchivosInforme::find($id)->archivo;

        return response()->download(public_path($archivo));
    }

    public function eliminarArchivo($id)
    {
        if(! $this->validarprivilegio('eliminar')) {
            return redirect()->back();
        }

        $archivo = ArchivosInforme::find($id);

        //Verificamos que exista el archivo para eliminarlo
        if (! Empty($archivo->archivo)) {
            if(Storage::exists($archivo->archivo)){
                Storage::delete($archivo->archivo);
            }
        }

        $archivo->delete();

        Session::flash('success', 'El archivo se elimino');
        return redirect()->back();
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

        $archivos = ArchivosInforme::where('informe_id',$id)->get();

        foreach ($archivos as $archivo){
            //Verificamos que exista el archivo para eliminarlo
            if (! Empty($archivo->archivo)) {
                if(Storage::exists($archivo->archivo)){
                    Storage::delete($archivo->archivo);
                }
            }

            $archivo->delete();
        }

        $informe = Informe::find($id);
        $informe->delete();

        Session::flash('success', 'El informe se elimino correctamente');
        return redirect()->back();
    }
}
