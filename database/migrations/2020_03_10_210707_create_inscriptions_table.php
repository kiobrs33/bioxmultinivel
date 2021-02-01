<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechaInscripcion'); 

            $table->integer('partners_id')->unsigned()->nullable();
            $table->foreign('partners_id')->references('id')->on('partners');

            $table->integer('packages_id')->unsigned()->nullable();
            $table->foreign('packages_id')->references('id')->on('packages');
            
            $table->integer('followers_id')->unsigned()->nullable();
            $table->foreign('followers_id')->references('id')->on('partners');

            $table->integer('orders_id')->unsigned()->nullable();
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
        Schema::dropIfExists('inscriptions');
    }
}