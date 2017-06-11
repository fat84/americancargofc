<?php

use Illuminate\Database\Seeder;
use App\Privilegios;

class PrivilegiosSeeder extends Seeder {


    public function run(){

        DB::table('privilegios')->delete();

        Privilegios::create(array(
            'id' => 1,
            'descripcion' => 'Usuario'
        ));
        Privilegios::create(array(
            'id' => 2,
            'descripcion' => 'Galeria'
        ));
        Privilegios::create(array(
            'id' => 3,
            'descripcion' => 'Informes'
        ));
        Privilegios::create(array(
            'id' => 4,
            'descripcion' => 'Eventos'
        ));
        Privilegios::create(array(
            'id' => 5,
            'descripcion' => 'Junta Directiva'
        ));
        Privilegios::create(array(
            'id' => 6,
            'descripcion' => 'Torneos'
        ));
        Privilegios::create(array(
            'id' => 7,
            'descripcion' => 'Socios'
        ));

    }

}