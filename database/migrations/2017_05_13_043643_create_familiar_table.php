<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrepadre');
            $table->string('nombremadre');
            $table->string('rolfamiliar');
            $table->string('nombrefamiliar');
            $table->string('profesionfamiliar');
            $table->string('empresalaborafamiliar');
            $table->string('telefonofamiliar');
            $table->integer('numhijos');
            $table->string('contactoemergencia');
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
        Schema::drop('familiar');
    }
}
