<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profesion');
            $table->string('gradoescolar');
            $table->string('titulo');
            $table->string('empresa');
            $table->string('direccionempresa');
            $table->string('telefonoempresa');
            $table->string('celularempresa');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('laboral');
    }
}
