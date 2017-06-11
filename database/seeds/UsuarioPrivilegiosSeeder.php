<?php
/**
 * Created by PhpStorm.
 * User: JUAN CARLOS
 * Date: 17/06/2015
 * Time: 12:23
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\UsuarioPrivilegios;

class UsuarioPrivilegiosSeeder extends Seeder  {

    public function run(){

        DB::table('usuario_privilegios')->delete();

        UsuarioPrivilegios::create([
            'id' => 1,
            'user_id' => 1,
            'privilegio_id' => 1,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);

        UsuarioPrivilegios::create([
            'id' => 2,
            'user_id' => 1,
            'privilegio_id' => 2,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);

        UsuarioPrivilegios::create([
            'id' => 3,
            'user_id' => 1,
            'privilegio_id' => 3,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);

        UsuarioPrivilegios::create([
            'id' => 4,
            'user_id' => 1,
            'privilegio_id' => 4,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);

        UsuarioPrivilegios::create([
            'id' => 5,
            'user_id' => 1,
            'privilegio_id' => 5,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);


        /* for($x=8; $x<50 ; $x++){
             UsuarioPrivilegios::create([
                 'id' => $x,
                 'usuario' => $x,
                 'privilegio' => 1,
                 'crear' => 1,
                 'editar' => 1,
                 'eliminar' => 1,
                 'consultar' => 1
             ]);
         }*/
    }

}