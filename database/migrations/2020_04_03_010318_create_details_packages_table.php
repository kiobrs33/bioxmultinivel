<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidadDetallePaquete');
            
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');

            $table->integer('packages_id')->unsigned();
            $table->foreign('packages_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_packages');
    }
}