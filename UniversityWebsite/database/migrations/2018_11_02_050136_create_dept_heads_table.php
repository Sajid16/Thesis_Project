<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dept_heads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deptID')->unsigned();
            $table->string('From');
            $table->string('To');
            $table->string('Name');
            $table->text('headMsg');
            $table->binary('headImg');
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
        Schema::dropIfExists('dept_heads');
    }
}
