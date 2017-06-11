<?php
/*<<<<<<<< Inicio Rutas Usuario >>>>>>>>*/
/** parametro inicial= usu */
/**/
/**/Route::get('usuario', 'UsuarioController@index');
/**/Route::post('storeusuario', 'UsuarioController@store');
/**/Route::post('editarusuario{id}', 'UsuarioController@edit');
/**/Route::post('updateusuario{id}', 'UsuarioController@update');
/**/Route::post('showusuario{id}', 'UsuarioController@show');
/**/Route::post('searchusuario', 'UsuarioController@search');
/**/ //Route::post('privilegiosusuario{id}', 'UsuarioController@privilegiosUsuario');
Route::post('privilegiosusuario{id}', ['as' => 'privilegiosusuario', 'uses' => 'UsuarioController@privilegiosUsuario']);
/**/ //Route::post('updateprivilegios{id}', 'UsuarioController@UpdatePrivilegiosUsuario');
Route::post('updateprivilegios{id}', ['as' => 'updateprivilegios', 'uses' => 'UsuarioController@updatePrivilegiosUsuario']);
/**/Route::get('segdoblepaso', 'UsuarioController@getSegdoblepaso');
/**/Route::post('segdoblepaso', 'UsuarioController@postSegdoblepaso');
/**/
/**//////rutas para los privilegios default de cada rol
/**/Route::get('defaultprivilegios', 'UsuarioController@defaultPrivilegiosRol');
/**/Route::post('showprivilegiodefaultrol{id}', 'UsuarioController@showPrivilegioDefaultRol');
/**/Route::post('defaultupdateprivilegios{id}', 'UsuarioController@updatePrivilegiosDefault');
/**/
/*<<<<<<<< Fin Rutas Usuario >>>>>>>>>>>*/
/**/