<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Evento;

Route::group(['middleware' => ['web', 'segdoblepaso', 'sesionactiva']], function () {

    //Ruta para la plantilla de usuarios autenticados
    Route::get('dashboard', 'UsuarioController@dashboard');

    /* <<<<<<<< Inicio Rutas Usuario >>>>>>>> */

    Route::get('usuario', ['as' => 'usuario', 'uses' => 'UsuarioController@index']);
    Route::post('storeusuario', ['as' => 'storeusuario', 'uses' => 'UsuarioController@store']);
    Route::post('editarusuario{id}', ['as' => 'editarusuario', 'uses' => 'UsuarioController@edit']);
    Route::post('updateusuario{id}', ['as' => 'updateusuario', 'uses' => 'UsuarioController@update']);
    Route::post('showusuario{id}', ['as' => 'showusuario', 'uses' => 'UsuarioController@show']);
    Route::get('searchusuario', ['as' => 'searchusuario', 'uses' => 'UsuarioController@search']);
    Route::post('privilegiosusuario{id}', ['as' => 'privilegiosusuario', 'uses' => 'UsuarioController@privilegiosUsuario']);
    Route::post('updateprivilegios{id}', ['as' => 'updateprivilegios', 'uses' => 'UsuarioController@updatePrivilegiosUsuario']);
    Route::post('pdfusuarios', ['as' => 'pdfusuarios', 'uses' => 'UsuarioController@pdfUsuarios']);

    //rutas del perfil de usuario
    Route::get('perfil', ['as' => 'perfil', 'uses' => 'UsuarioController@perfil']);
    Route::post('editarperfil', ['as' => 'editarperfil', 'uses' => 'UsuarioController@editarPerfil']);
    Route::post('updateperfil', ['as' => 'updateperfil', 'uses' => 'UsuarioController@updatePerfil']);
    Route::post('destroysesion{codigosesion}', ['as' => 'destroysesion', 'uses' => 'UsuarioController@destroySesion']);
    Route::post('eliminarfotoperfil', ['as' => 'eliminarfotoperfil', 'uses' => 'UsuarioController@eliminarFotoPerfil']);

    /////rutas para los privilegios default de cada rol
    Route::get('defaultprivilegios', ['as' => 'defaultprivilegios', 'uses' => 'UsuarioController@defaultPrivilegiosRol']);
    Route::post('showprivilegiodefaultrol{id}', ['as' => 'showprivilegiodefaultrol', 'uses' => 'UsuarioController@showPrivilegioDefaultRol']);
    Route::post('defaultupdateprivilegios{id}', ['as' => 'defaultupdateprivilegios', 'uses' => 'UsuarioController@updatePrivilegiosDefault']);

    /* <<<<<<<< Fin Rutas Usuario >>>>>>>>>>> */

    /* <<<<<<<< Inicio Rutas Informe >>>>>>>> */
    Route::get('informe', ['as' => 'informe', 'uses' => 'InformeController@index']);
    Route::post('storeinforme', ['as' => 'storeinforme', 'uses' => 'InformeController@store']);
    Route::post('editarinforme{id}', ['as' => 'editarinforme', 'uses' => 'InformeController@edit']);
    Route::post('updateinforme{id}', ['as' => 'updateinforme', 'uses' => 'InformeController@update']);
    Route::get('getarchivos{id}', ['as' => 'getarchivos', 'uses' => 'InformeController@getArchivos']);
    Route::post('storearchivo{id}', ['as' => 'storearchivo', 'uses' => 'InformeController@storeArchivo']);
    Route::post('editararchivo{id}', ['as' => 'editararchivo', 'uses' => 'InformeController@editArchivo']);
    Route::post('descargararchivo{id}', ['as' => 'descargararchivo', 'uses' => 'InformeController@descargarArchivo']);
    Route::get('eliminararchivo{id}', ['as' => 'eliminararchivo', 'uses' => 'InformeController@eliminarArchivo']);
    Route::get('eliminarinforme{id}', ['as' => 'eliminarinforme', 'uses' => 'InformeController@destroy']);
    /* <<<<<<<< Fin Rutas Informe >>>>>>>> */

    /* <<<<<<<< Inicio Rutas Socio >>>>>>>> */
    Route::get('socios', ['as' => 'socios', 'uses' => 'SocioController@index']);
    Route::post('storesocio', ['as' => 'storesocio', 'uses' => 'SocioController@store']);
    Route::post('editarsocio{id}', ['as' => 'editarsocio', 'uses' => 'SocioController@edit']);
    Route::post('updatesocio{id}', ['as' => 'updatesocio', 'uses' => 'SocioController@update']);

    /* <<<<<<<< Inicio Rutas Torneo >>>>>>>> */
    Route::get('torneos', ['as' => 'torneos', 'uses' => 'TorneoController@index']);
    Route::post('storetorneo', ['as' => 'storetorneo', 'uses' => 'TorneoController@store']);
    Route::post('editartorneo{id}', ['as' => 'editartorneo', 'uses' => 'TorneoController@edit']);
    Route::post('updatetorneo{id}', ['as' => 'updatetorneo', 'uses' => 'TorneoController@update']);

    Route::get('infotorneo{id}', ['as' => 'infotorneo', 'uses' => 'TorneoController@infoTorneo']);

    Route::get('fechapartido', ['as' => 'fechapartido', 'uses' => 'TorneoController@fechasPartido']);
    Route::post('golfechapartido', ['as' => 'golfechapartido', 'uses' => 'TorneoController@golFechasPartido']);
    Route::post('tamarillafechapartido', ['as' => 'tamarillafechapartido', 'uses' => 'TorneoController@tAmarillaFechasPartido']);
    Route::post('trojafechapartido', ['as' => 'trojafechapartido', 'uses' => 'TorneoController@tRojaFechasPartido']);
    Route::post('storefechaequipo', ['as' => 'storefechaequipo', 'uses' => 'TorneoController@storeFechaEquipo']);
    Route::post('updatefechaequipo', ['as' => 'updatefechaequipo', 'uses' => 'TorneoController@updateFechaEquipo']);
    Route::get('deletefechapartido{id}', ['as' => 'deletefechapartido', 'uses' => 'TorneoController@destroyFechaEquipo']);

    Route::get('posiciones', ['as' => 'posiciones', 'uses' => 'TorneoController@posiciones']);
    Route::post('storeposicion', ['as' => 'storeposicion', 'uses' => 'TorneoController@storePosicion']);
    Route::get('deleteposicion{id}', ['as' => 'deleteposicion', 'uses' => 'TorneoController@deletePosicion']);

    Route::get('vallamenosvencida', ['as' => 'vallamenosvencida', 'uses' => 'TorneoController@vallaMenosVencida']);
    Route::post('storevmenosvencida', ['as' => 'storevmenosvencida', 'uses' => 'TorneoController@storeVMenosVencida']);
    Route::get('deletevmenosvencida{id}', ['as' => 'deletevmenosvencida', 'uses' => 'TorneoController@deleteVMenosVencida']);

    Route::get('goleadores', ['as' => 'goleadores', 'uses' => 'TorneoController@goleadores']);
    Route::post('storegoleador', ['as' => 'storegoleador', 'uses' => 'TorneoController@storeGoleador']);
    Route::get('deletegoleador{id}', ['as' => 'deletegoleador', 'uses' => 'TorneoController@deleteGoleador']);

    Route::get('tarjetasrojas', ['as' => 'tarjetasrojas', 'uses' => 'TorneoController@tarjetasRojas']);
    Route::post('storetroja', ['as' => 'storetroja', 'uses' => 'TorneoController@storeTRoja']);
    Route::get('deletetroja{id}', ['as' => 'deletetroja', 'uses' => 'TorneoController@deleteTRoja']);

    Route::get('tarjetasamarillas', ['as' => 'tarjetasamarillas', 'uses' => 'TorneoController@tarjetasAmarillas']);
    Route::post('storetamarilla', ['as' => 'storetamarilla', 'uses' => 'TorneoController@storeTAmarilla']);
    Route::get('deletetamarilla{id}', ['as' => 'deletetamarilla', 'uses' => 'TorneoController@deleteTAmarilla']);

    Route::get('sanciones', ['as' => 'sanciones', 'uses' => 'TorneoController@sanciones']);
    Route::post('storesancion', ['as' => 'storesancion', 'uses' => 'TorneoController@storeSancion']);
    Route::get('deletesancion{id}', ['as' => 'deletesancion', 'uses' => 'TorneoController@deleteSancion']);

    Route::get('fixturys', ['as' => 'fixturys', 'uses' => 'TorneoController@fixturys']);
    Route::post('storefixtury', ['as' => 'storefixtury', 'uses' => 'TorneoController@storeFixtury']);
    Route::get('deletefixtury{id}', ['as' => 'deletefixtury', 'uses' => 'TorneoController@deleteFixtury']);
    Route::get('descargarfixtury{id}', ['as' => 'descargarfixtury', 'uses' => 'TorneoController@descargarFixtury']);

    Route::get('equipostorneo', ['as' => 'equipostorneo', 'uses' => 'TorneoController@equiposTorneo']);
    Route::post('storeequipotorneo', ['as' => 'storeequipotorneo', 'uses' => 'TorneoController@storeEquipoTorneo']);
    Route::post('editequipotorneo{id}', ['as' => 'editequipotorneo', 'uses' => 'TorneoController@editEquipoTorneo']);
    Route::post('updateequipotorneo{id}', ['as' => 'updateequipotorneo', 'uses' => 'TorneoController@updateEquipoTorneo']);

    Route::get('getjugadoresequipo{id}', ['as' => 'getjugadoresequipo', 'uses' => 'TorneoController@getJugadoresEquipo']);
    Route::post('setjugadorequipo{id}', ['as' => 'setjugadorequipo', 'uses' => 'TorneoController@setJugadorEquipo']);
    Route::get('deletejugadorequipo{id}', ['as' => 'deletejugadorequipo', 'uses' => 'TorneoController@deleteJugadorEquipo']);


    /***<<<<<Galeria de imagenes>>>>>>****/
    Route::get('galeria/index','GaleriaController@index');
    Route::post('crearGaleria','GaleriaController@store2');
    Route::post('agregarImagen','GaleriaController@agregarImagenes');
    Route::get('eliminarGaleria/{id}','GaleriaController@destroy');
    Route::get('eliminarImagen/{id}/{id2}','GaleriaController@destroy2');
    Route::get('galeria/individual/{id}','GaleriaController@edit');
    Route::resource('galeriass','GaleriaController');
    Route::post('actualizarImagen','GaleriaController@update');
    /***<<<<<Galeria de imagenes>>>>>>****/
    Route::get('eventos','EventoController@index');
    Route::get('eventos/nuevo','EventoController@create');
    Route::post('eventos/guardar', 'EventoController@store');
    Route::get('eventos/eliminar/{id}', 'EventoController@destroy');
    Route::get('eventos/editar/{id}', 'EventoController@edit');
    Route::post('eventos/actualizar', 'EventoController@update');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //Route::get('/home', 'HomeController@index');
    Route::get('segdoblepaso', ['as' => 'getsegdoblepaso', 'uses' => 'UsuarioController@getSegdoblepaso']);
    Route::post('segdoblepaso', ['as' => 'setsegdoblepaso', 'uses' => 'UsuarioController@postSegdoblepaso']);

    Route::get('contacto', ['as' => 'contacto', 'uses' => 'EmailController@contacto']);
    Route::post('emailcontacto', ['as' => 'emailcontacto', 'uses' => 'EmailController@contactenos']);

    Route::get('excusas', ['as' => 'excusas', 'uses' => 'EmailController@excusas']);
    Route::post('emailexcusas', ['as' => 'emailexcusas', 'uses' => 'EmailController@emailExcusas']);

    Route::get('indexinformes', ['as' => 'indexinformes', 'uses' => 'IndexController@informes']);
    Route::get('indexarchivosinformes{id}', ['as' => 'indexarchivosinformes', 'uses' => 'IndexController@archivosInforme']);
    Route::post('indexdescargararchivo{id}', ['as' => 'indexdescargararchivo', 'uses' => 'IndexController@indexDescargarArchivo']);

    Route::get('indextorneos', ['as' => 'indextorneos', 'uses' => 'IndexTorneoController@index']);
    Route::get('indexinfotorneo{id}', ['as' => 'indexinfotorneo', 'uses' => 'IndexTorneoController@indexInfoTorneo']);
    Route::get('indexfechaspartido', ['as' => 'indexfechaspartido', 'uses' => 'IndexTorneoController@indexFechasPartido']);
    Route::get('indextablaposiciones', ['as' => 'indextablaposiciones', 'uses' => 'IndexTorneoController@indexTablaPosiciones']);
    Route::get('indexvallamenosvencida', ['as' => 'indexvallamenosvencida', 'uses' => 'IndexTorneoController@vallaMenosVencida']);
    Route::get('indexgoleadores', ['as' => 'indexgoleadores', 'uses' => 'IndexTorneoController@Goleadores']);
    Route::get('indextarjetasrojas', ['as' => 'indextarjetasrojas', 'uses' => 'IndexTorneoController@tarjetasRojas']);
    Route::get('indextarjetasamarillas', ['as' => 'indextarjetasamarillas', 'uses' => 'IndexTorneoController@tarjetasAmarillas']);
    Route::get('indexsanciones', ['as' => 'indexsanciones', 'uses' => 'IndexTorneoController@sanciones']);
    Route::get('indexfixtury', ['as' => 'indexfixtury', 'uses' => 'IndexTorneoController@fixtury']);
    Route::get('indexdescargarfixtury', ['as' => 'indexdescargarfixtury', 'uses' => 'IndexTorneoController@indexDescargarFixtury']);
    Route::get('indexinfoequipo', ['as' => 'indexinfoequipo', 'uses' => 'IndexTorneoController@indexInfoEquipo']);
    Route::get('indexjuadoresequipo{id}', ['as' => 'indexjuadoresequipo', 'uses' => 'IndexTorneoController@indexJuadoresEquipo']);

    Route::get('/', function () {
        return view('index.principal');
    });

    Route::get('nosotros', function () {
        return view('index.about');
    });
    Route::get('galerias', function () {
        return view('index.gallery');
    });

    Route::get('galerias/lista',function (){
        return view('index.galeria2');
    });
    Route::get('/galeria/individuals/{id}',function ($id){
        $imagenes = \App\Imagen::where('galeria_id','=',$id)->get();
        return view('index.galeria3',compact('imagenes'));
    });


    Route::get('tablass', function () {
        return view('index.tablastorneo');
    });

    Route::get('juntadirectiva', function () {
        return view('index.junta');
    });

    Route::get('prueba', function () {

    });
    Route::get('eventos/lista',function(){

        $eventos = Evento::where('fecha','>=',\date('Y-m-d H:m:s'))
            ->OrderBy('fecha','ASC')->paginate(4);
        return view('index.eventos')->with(['eventos'=> $eventos]);
    });

    Route::get('eventos/detalle/{id}',function($id){

        $evento = Evento::find($id);
        if($evento!=null){
            return view('index.un_evento')->with(['evento'=> $evento]);
        }else{
            return redirect('eventos/lista');
        }

    });

    Route::get('prueba', ['as' => 'prueba', 'uses' => 'HomeController@prueba']);

});

