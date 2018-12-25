<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('libraryID')->unsigned();
            $table->string('libImg');
            $table->foreign('libraryID')->references('id')->on('library_details');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_images');
    }
}
