<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deptId')->unsigned();
            $table->text('newsTitle');
            $table->string('newsPDF');
            $table->date('postDate');        
            $table->string('validity');
            $table->string('pageLink');
            $table->string('newsImg');
            $table->text('description');
            $table->foreign('deptId')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
