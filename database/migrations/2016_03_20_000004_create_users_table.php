<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned()->unique();
            $table->integer('rol_id')->unsigned();
            $table->boolean('activo')->default(1);
            $table->string('estado');
            $table->boolean('segdoblepaso')->default(0);
            $table->boolean('alertsesion')->default(0);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');

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
        Schema::drop('users');
    }
}
