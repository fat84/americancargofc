<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('identificacion')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular');
            $table->string('barrio');
            $table->string('direccion');
            $table->string('foto')->default('img/usuarios/default.png');
            $table->date('fechanacimiento');
            $table->string('lugarnacimiento');
            $table->string('telcasa');
            $table->string('telcasa2');
            $table->string('emailadicional');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personas');
	}

}
