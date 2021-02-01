<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_registro');
            $table->double('total_compra');
            $table->double('subtotal_compra');
            $table->double('impuesto_compra');
            $table->string('nro_comprobante');
            $table->string('slug');

            $table->integer('providers_id')->unsigned();
            $table->foreign('providers_id')->references('id')->on('providers');

            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}