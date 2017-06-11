<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\Imagen;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Redirect;

class GaleriaController extends Controller
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
            if ($privilegio->privilegio_id == 2 && $privilegio->$accion == 0) {
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

        $galerias = Galeria::all();
       return view('galeria.index',['galerias'=>$galerias]);
    }

    public function guardarGaleria(Request $request){
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }
        $galeria = new Galeria;
        $galeria->nombre = $request->titulo;
        $img = $request->file('imagen');
        $file_route = time() . '_' . $img->getClientOriginalName();
        Storage::disk('galeria')->put($file_route, file_get_contents($img->getRealPath()));
        $galeria->archivo = $file_route;
        $galeria->save();

        return redirect()->with('success','Galeria creada correctamente');

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

    //en este se guardan las imagenes del dropzone
    public function store(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        $imagenes = new Imagen;
        $imagenes->titulo = $request->titulo;
        $imagenes->galeria_id = $request->galeria_id;

        $image = $request->file('file');

       $contador = count($image);
       $imageName = "";
        for($i=0; $i<$contador; $i++){
            echo $i;
            $imageName = time().$image[$i]->getClientOriginalName();
            $image[$i]->move(public_path('/galeria/imagenes/'),$imageName);
            $imagenes->archivo = $imageName;
        }


       /* foreach ($image as $image){
            $imageName = time().$image->getClientOriginalName();
            $image->move(public_path('/galeria/imagenes/'),$imageName);
            $imagenes->archivo = $imageName;
        }*/
        $imagenes->save();
        return response()->json(['success'=>$imageName]);


       /* $path = public_path().'/galeria/imagenes/';
        $files = $request->file('file');
        foreach($files as $file){
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $imagenes->archivo = $fileName;
        }
        $imagenes->save();

       // $img = $request->file('file');
       /* foreach($img as $file){
            $file_route = time() . '_' . $file->getClientOriginalName();
            Storage::disk('imagenes')->put($file_route, file_get_contents($file->getRealPath()));
            $imagenes->archivo = $file_route;
            $imagenes->save();
        }*/

        return redirect('galeria/individual/'.$request->galeria_id)->with('success','Imagen subida correctamente');
    }

    //en este se guarda la galeria
    public function store2(Request $request)
    {
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }

        $galeria = new Galeria;
        $galeria->nombre = $request->titulo;
        $img = $request->file('imagen');
        $file_route = time() . '_' . $img->getClientOriginalName();
        Storage::disk('galeria')->put($file_route, file_get_contents($img->getRealPath()));
        $galeria->archivo = $file_route;
        $galeria->save();

        return redirect('/galeria/index')->with('success','Galeria creada correctamente');
    }



    public function agregarImagenes(Request $request){
        if(! $this->validarprivilegio('crear')) {
            return redirect()->back();
        }
        $imagenes = new Imagen;
        $imagenes->titulo = $request->titulo;
        $imagenes->galeria_id = $request->galeria_id;
        $img = $request->file('imagen');
        $file_route = time() . '_' . $img->getClientOriginalName();
        Storage::disk('imagenes')->put($file_route, file_get_contents($img->getRealPath()));
        $imagenes->archivo = $file_route;
        $imagenes->save();

        return redirect('galeria/individual/'.$request->galeria_id)->with('success','Imagen subida correctamente');

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
        $galeria = Galeria::find($id);
        $imagenes = Imagen::where('galeria_id','=',$id)->get();

        return view('galeria.individual',compact('galeria','imagenes'));
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
        $galeria = Galeria::find($id);
        $galeria->delete();
        return redirect('/galeria/index')->with('success','Galeria eliminada correctamente');
        //codigo
    }
    //este para eliminar imagenes
    public function destroy2($id,$id2)
    {
        if(! $this->validarprivilegio('eliminar')) {
            return redirect()->back();
        }

        $imagen = Imagen::find($id);
        $imagen->delete();
        return redirect('/galeria/individual/'.$id2)->with('success','Imagen eliminada correctamente');
        //codigo
    }


    public function galeriasVista(){
        
    }
}
