<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active'); //0: Pending, 1: active, 2:not active
            $table->integer('user_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->boolean('trusted');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description')->nullable();
            $table->string('en_description')->nullable();
            $table->string('ar_logo');
            $table->string('en_logo');
            $table->string('ar_banner');
            $table->string('en_banner');
            $table->boolean('return_policy');
            $table->text('return_text')->nullable();
            $table->boolean('seller_guaranty');
            $table->text('guaranty_text')->nullable();
            $table->text('store_policy')->nullable();
            $table->float('rating_percent')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
