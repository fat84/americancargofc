<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTequipojugadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tequipojugador', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tequipo_id')->unsigned();
            $table->foreign('tequipo_id')->references('id')->on('torneoequipo')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('tequipojugador');
    }
}
