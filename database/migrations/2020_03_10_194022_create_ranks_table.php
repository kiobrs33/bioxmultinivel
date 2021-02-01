<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreRango');
            $table->text('descripcionRango');
            $table->integer('puntajePersonalRango');
            $table->integer('puntajeGrupalRango');
            $table->integer('puntajeDirectosRango');
            $table->integer('activosFranquiciadosRango');
            $table->string('slugRango');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}