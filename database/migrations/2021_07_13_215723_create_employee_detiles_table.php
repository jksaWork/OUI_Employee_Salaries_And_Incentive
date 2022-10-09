<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_detiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->smallInteger('company_id')->nullable();
            $table->smallInteger('category_id')->nullable();
            $table->smallInteger('job_id')->nullable();
            $table->smallInteger('active')->default(1);
            $table->decimal('const_salary')->nullable();
            $table->decimal('salary')->nullable();
            $table->decimal('all_salary')->nullable();
            $table->string('notes');
            $table->string('due_date');
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
        Schema::dropIfExists('employee_detiles');
    }
}