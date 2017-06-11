<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfopersonaclubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infopersonaclub', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numerosocio');
            $table->string('numerocamiseta');
            $table->string('nivel');
            $table->string('posicion');
            $table->boolean('lesionado')->default(0);
            $table->boolean('standby')->default(0);
            $table->date('standby_desde');
            $table->date('standby_hasta');
            $table->string('cuotasostenimiento');
            $table->string('tallacamiseta');
            $table->string('tallapantaloneta');
            $table->string('numcalzado');
            $table->text('observaciones');
            $table->string('tiposocio');
            $table->boolean('activo')->default(1);
            $table->string('lesion');
            $table->string('categoria');
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
        Schema::drop('infopersonaclub');
    }
}
