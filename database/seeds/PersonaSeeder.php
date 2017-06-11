<?php
/**
 * Created by PhpStorm.
 * User: JUAN CARLOS
 * Date: 04/06/2015
 * Time: 12:12
 */

use Illuminate\Database\Seeder;
use App\Persona;
use Faker\Factory as Faker;

class PersonaSeeder extends Seeder {

    public function run(){

        DB::table('personas')->delete();

        Persona::create(array(
            'id' => 1,
            'identificacion' => '12345',
            'nombre'  => 'Juan Carlos',
            'apellido'  => 'Macias Zambrano',
            'celular'  => '0000',
            'direccion'  => 'Direccion x',
            'barrio'  => 'Barrio x'
        ));
        Persona::create(array(
            'id' => 2,
            'identificacion' => '123456',
            'nombre'  => 'Nombre User',
            'apellido'  => 'Apellido User',
            'celular'  => '0000',
            'direccion'  => 'Direccion user',
            'barrio'  => 'Barrio user'
        ));

        /*$faker = Faker::create();
        for ($i=3; $i < 50; $i++) {
            \DB::table('personas')->insert(array(
                'id' => $i,
                'identificacion' => '123456'.$i,
                'nombre'  => $faker->firstName,
                'apellido'  => $faker->lastName,
                'celular'  => $faker->phoneNumber,
                'direccion'  => $faker->streetAddress,
                'barrio'  => $faker->streetName
            ));
        }*/

    }

}