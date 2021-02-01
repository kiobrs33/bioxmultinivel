<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoPedido');
            $table->double('totalPedido');
            $table->double('impuestoPedido');
            $table->double('subtotalPedido');
            $table->integer('puntosTotalPedido');
            $table->string('numeroComprobantePedido');
            $table->datetime('fechaPedido');
            $table->datetime('fechaEntregaPedido');
            $table->enum('estadoPedido', ['solicitado','aceptado','entregado','cancelado']);
            $table->string('slugPedido');

            $table->integer('partners_id')->unsigned();
            $table->foreign('partners_id')->references('id')->on('partners');

            $table->integer('employees_id')->unsigned()->nullable();
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
        Schema::dropIfExists('orders');
    }
}