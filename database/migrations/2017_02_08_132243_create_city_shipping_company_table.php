<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityShippingCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_shipping_company', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id');
            $table->integer('shipping_company_id');
            $table->float('price');
            $table->integer('currency_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_shipping_company');
    }
}
