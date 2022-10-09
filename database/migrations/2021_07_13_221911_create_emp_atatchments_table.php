<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpAtatchmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_atatchments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('file_name');
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
        Schema::dropIfExists('emp_atatchments');
    }
}