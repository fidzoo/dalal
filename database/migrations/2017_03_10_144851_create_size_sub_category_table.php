<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_sub_category');
    }
}
