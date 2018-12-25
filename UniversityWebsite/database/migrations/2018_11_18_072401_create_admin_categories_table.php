<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('CategoryID')->unsigned();
            $table->text('Description')->nullable();
            $table->integer('employeeID')->unsigned();
            $table->integer('adminCategoryID')->unsigned();
            $table->foreign('employeeID')->references('id')->on('employees');
            $table->foreign('adminCategoryID')->references('id')->on('admin_menus');
            $table->foreign('CategoryID')->references('id')->on('employee_positions');
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
        Schema::dropIfExists('admin_categories');
    }
}
