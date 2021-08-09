<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('customers_id')->unsigned()->nullable();
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->string('order_descript');
            $table->string('order_amount');
            $table->string('status')->default('Pending');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
