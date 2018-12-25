<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('positionID')->unsigned();
            $table->integer('deptID')->unsigned();
            $table->string('Name');
            $table->text('Education')->nullable();
            $table->text('Experience')->nullable();
            $table->text('Publications')->nullable();
            $table->text('AreaofInterest')->nullable();
            $table->string('employeeImg');
            $table->string('employeeEmail');
            $table->foreign('positionID')->references('id')->on('employee_positions');
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
        Schema::dropIfExists('employees');
    }
}
