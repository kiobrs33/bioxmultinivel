<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombresTrabajador');
            $table->string('apellidoPaternoTrabajador');
            $table->string('apellidoMaternoTrabajador');
            $table->string('telefonoTrabajador');
            $table->string('direccionTrabajador');
            $table->string('dniTrabajador');
            $table->enum('sexoTrabajador', ['masculino','femenino']);
            $table->string('slugTrabajador');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}