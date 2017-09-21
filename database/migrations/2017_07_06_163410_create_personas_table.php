<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            //
        });
        Schema::create('personas', function (Blueprint $table){
            $table->increments('id');
            $table->integer('cedula')->unique();
            $table->string('nombre',60);
            $table->string('apellido',60);
            $table->integer('edad');
            $table->string('email',100);
            $table->string('foto',20);
            $table->string('fotopermiso',25);
            $table->boolean('animador');
            $table->boolean('miembrocj');
            $table->boolean('dinamizador');
            $table->boolean('experiencia');
            $table->integer('zona');
            $table->boolean('aprobado');
            $table->integer('localidads_id')->unsigned();
            $table->foreign('localidads_id')->references('id')->on('localidads');
            $table->timestamps();
        });
        //DB::statement("ALTER TABLE personas ADD foto LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
