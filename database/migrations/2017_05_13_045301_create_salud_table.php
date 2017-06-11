<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salud', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estatura');
            $table->string('peso');
            $table->string('imc');
            $table->string('estadoimc');
            $table->string('entidadsalud');
            $table->string('riesgosprofesionales');
            $table->string('tiposangre');
            $table->string('alergias');
            $table->string('fracturas');
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
        Schema::drop('salud');
    }
}
