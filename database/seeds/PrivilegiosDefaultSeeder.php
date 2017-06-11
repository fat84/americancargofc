<?php
/**
 * Created by PhpStorm.
 * User: JUAN CARLOS
 * Date: 16/06/2015
 * Time: 8:47
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\PrivilegiosDefault;

class PrivilegiosDefaultSeeder extends Seeder  {

    public function run(){

        DB::table('privilegios_default')->delete();

        //privilegios default admin
        PrivilegiosDefault::create([
            'id' => 1,
            'rol_id' => 1,
            'privilegio_id' => 1,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);
        PrivilegiosDefault::create([
            'id' => 2,
            'rol_id' => 1,
            'privilegio_id' => 2,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);
        PrivilegiosDefault::create([
            'id' => 3,
            'rol_id' => 1,
            'privilegio_id' => 3,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);
        PrivilegiosDefault::create([
            'id' => 4,
            'rol_id' => 1,
            'privilegio_id' => 4,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);
        PrivilegiosDefault::create([
            'id' => 5,
            'rol_id' => 1,
            'privilegio_id' => 5,
            'crear' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'consultar' => 1
        ]);




    }

}