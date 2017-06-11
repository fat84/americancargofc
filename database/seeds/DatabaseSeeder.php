<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('PersonaSeeder');
        $this->call('RolSeeder');
        $this->call('PrivilegiosSeeder');
        $this->call('UsuarioSeeder');
        $this->call('PrivilegiosDefaultSeeder');
        $this->call('UsuarioPrivilegiosSeeder');
    }
}
