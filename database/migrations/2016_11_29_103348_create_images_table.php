<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title')->length(100)->nullable();
            $table->string('en_title')->length(100)->nullable();
            $table->string('ar_description')->nullable();
            $table->string('en_description')->nullable();
            $table->string('path_ar')->nullable(); //for image arabic version
            $table->string('path_en')->nullable(); //for image english version
            $table->string('imageable_type')->length('30');
            $table->integer('imageable_id');
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
        Schema::dropIfExists('images');
    }
}
