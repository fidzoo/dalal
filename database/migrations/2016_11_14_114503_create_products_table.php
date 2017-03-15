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
            $table->integer('store_id');
            $table->integer('sub_category_id');
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('ar_short_descrip');
            $table->string('en_short_descrip');
            $table->text('ar_long_descrip');
            $table->text('en_long_descrip');
            $table->float('price');
            $table->string('price_type')->length(50)->nullable();//price for single piece/Bluk and so on.
            $table->boolean('price_offer')->nullable();
            $table->float('offer_price')->nullable();
            $table->boolean('qty_offer');
            $table->integer('currency_id');
            $table->integer('stock');
            $table->integer('sell_count')->nullable();
            $table->string('colors_type')->length(6)->nullable();
            $table->string('ar_unit_type')->length(20)->nullable();
            $table->string('en_unit_type')->length(20)->nullable();
            $table->string('ar_package_weight')->nullable();
            $table->string('en_package_weight')->nullable();
            $table->string('ar_package_size')->nullable();
            $table->string('en_package_size')->nullable();
            $table->string('video')->length(300)->nullable();
            $table->float('rating_percent')->nullable();
            $table->boolean('todays_deal')->nullable();
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
