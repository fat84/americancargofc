<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosdefaultTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privilegios_default', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->integer('privilegio_id')->unsigned();
            $table->boolean('crear');
            $table->boolean('editar');
            $table->boolean('eliminar');
            $table->boolean('consultar');

            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');
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
		Schema::drop('privilegios_default');
	}

}
