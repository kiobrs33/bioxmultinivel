<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->double('precio_unitario');

            $table->integer('incomes_id')->unsigned();
            $table->foreign('incomes_id')->references('id')->on('incomes');

            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_incomes');
    }
}