<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombresSocio');
            $table->string('apellidoPaternoSocio');
            $table->string('apellidoMaternoSocio');
            $table->datetime('fechaNacimientoSocio');
            $table->string('direccionSocio');
            $table->string('dniSocio');
            $table->enum('sexoSocio', ['masculino','femenino']);
            $table->string('telefonoSocio');
            $table->string('paisSocio');
            $table->string('departamentoSocio');
            $table->string('provinciaSocio');
            $table->string('distritoSocio');
            $table->string('slugSocio');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');

            $table->integer('ranks_id')->unsigned()->nullable();
            $table->foreign('ranks_id')->references('id')->on('ranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}