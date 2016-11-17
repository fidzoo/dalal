<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('approve'); //0: Pending, 1: approved 2:rejected
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('ar_short_descrip');
            $table->string('en_short_descrip');
            $table->text('ar_long_descrip');
            $table->text('en_long_descrip');
            $table->integer('stock');
            $table->integer('sell_count');
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
        Schema::dropIfExists('products');
    }
}
