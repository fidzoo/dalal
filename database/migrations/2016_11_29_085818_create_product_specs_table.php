<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title')->length('25');
            $table->string('ar_detail')->nullable();
            $table->string('en_title')->length('25')->nullable();
            $table->string('en_detail')->nullable();
            $table->string('specsable_type')->length('20');
            $table->integer('specsable_id');
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
        Schema::dropIfExists('product_specs');
    }
}
