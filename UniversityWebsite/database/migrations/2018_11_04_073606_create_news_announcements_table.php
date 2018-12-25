<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('news_announcements', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('deptID')->unsigned();
          $table->foreign('deptID')->references('id')->on('departments');
          $table->text('newsTitle');
          $table->binary('newsPDF');
          $table->date('postDate');
          $table->string('validity');
          $table->string('pageLink');
          // $table->softDeletes();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_announcements');
    }
}
