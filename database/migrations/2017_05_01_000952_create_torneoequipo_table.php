<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneoequipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneoequipo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneo')->onDelete('cascade');

            $table->integer('equipo_id')->unsigned();
            $table->foreign('equipo_id')->references('id')->on('equipo')->onDelete('cascade');

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
        Schema::drop('torneoequipo');
    }
}
