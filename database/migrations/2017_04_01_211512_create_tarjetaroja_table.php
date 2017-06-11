<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetarojaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetaroja', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('troja');
            $table->string('minuto');

            $table->integer('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneo')->onDelete('cascade');

            $table->integer('equipo_id')->unsigned();
            $table->foreign('equipo_id')->references('id')->on('equipo')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('fechapartido_id')->unsigned();
            $table->foreign('fechapartido_id')->references('id')->on('fechapartido')->onDelete('cascade');

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
        Schema::drop('tarjetaroja');
    }
}
