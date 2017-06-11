<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechapartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechapartido', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('hora');
            $table->integer('golesuno');
            $table->integer('golesdos');
            $table->string('estado');

            $table->integer('escenario_id')->unsigned();
            $table->foreign('escenario_id')->references('id')->on('escenario')->onDelete('cascade');

            $table->integer('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneo')->onDelete('cascade');

            $table->integer('equipouno')->unsigned();
            $table->integer('equipodos')->unsigned();

            $table->foreign('equipouno')->references('id')->on('equipo')->onDelete('cascade');
            $table->foreign('equipodos')->references('id')->on('equipo')->onDelete('cascade');

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
        Schema::drop('fechapartido');
    }
}
