<?php
/**cp
 * Created by PhpStorm.
 * User: JUAN CARLOS
 * Date: 04/06/2015
 * Time: 12:33
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Rol;

class RolSeeder extends Seeder  {

    public function run(){

        DB::table('rol')->delete();

        Rol::create([
            'id' => 1,
            'nombre' => 'Administrador'
        ]);

        Rol::create([
            'id' => 2,
            'nombre' => 'Contador'
        ]);

    }

}