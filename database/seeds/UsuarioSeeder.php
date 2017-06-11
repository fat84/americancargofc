<?php
/**
 * Created by PhpStorm.
 * User: JUAN CARLOS
 * Date: 04/06/2015
 * Time: 12:11
 */

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder {

    public function run(){

        DB::table('users')->delete();

        User::create(array(
            'id' => 1,
            'persona_id' => 1,
            'rol_id'  => 1,
            'email' => 'admin@gmail.com',
            'password' => 'admin2017'

        ));

        User::create(array(
            'id' => 2,
            'persona_id' => 2,
            'rol_id'  => 1,
            'email' => 'admin2@gmail.com',
            'password' => 'admin2017'
        ));

        /*$faker = Faker::create();
        for ($i=3; $i < 50; $i++) {
            \DB::table('users')->insert(array(
                'id' => $i,
                'persona_id' => $i,
                'rol_id'  => $faker->numberBetween($min = 1, $max = 4),
                'activo'  => $faker->numberBetween($min = 0, $max = 1),
                'email' => $faker->email,
                'password' => '12345'
            ));
        }*/

    }


}