<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearUsuarioPrivilegios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario_privilegios', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('privilegio_id')->unsigned();
            $table->boolean('crear');
            $table->boolean('eliminar');
            $table->boolean('editar');
            $table->boolean('consultar');

            $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('privilegio_id')->references('id')->on('privilegios')->onDelete('cascade');

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
		Schema::drop('usuario_privilegios');
	}

}
