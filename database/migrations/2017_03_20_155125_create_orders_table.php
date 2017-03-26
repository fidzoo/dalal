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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->integer('store_owner')->unsigned();  //Merchant user id
            $table->foreign('store_owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('order_status')->nullable(); //0:In review - 1:Partially Shipped - 2:Completely Shipped - 3:Partially Delivered - 4:Completely Delivered - 5:Product Return 
            $table->integer('payment_status')->nullable(); //0:
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
        Schema::dropIfExists('orders');
    }
}
