<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidadDetallePedido');
            $table->double('precioDetallePedido');
            $table->double('subtotalPrecioDetallePedido');
            $table->integer('puntosDetallePedido');
            $table->integer('subtotalPuntosDetallePedido');
            
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            
            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_orders');
    }
}