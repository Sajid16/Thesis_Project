<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentID');
            $table->string('Name');
            $table->integer('deptID')->unsigned();
            $table->string('cgpa');
            $table->string('studentEmail');
            $table->string('currentPosition');
            $table->string('passingYear');
            $table->foreign('deptID')->references('id')->on('departments');
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
        Schema::dropIfExists('alumnis');
    }
}
