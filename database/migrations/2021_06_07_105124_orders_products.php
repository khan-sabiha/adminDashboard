<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function(Blueprint $table){
            $table->increments('id');
            $table->integer('orders_id')->unsigned()->nullable();
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');;
            $table->integer('products_id')->unsigned()->nullable();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');;
            $table->integer('quantity')->unsigned();
            $table->string('total');
            $table->string('status')->nullable()->default('Pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}