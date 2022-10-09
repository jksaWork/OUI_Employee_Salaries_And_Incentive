<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->integer('age');
            $table->string('note')->nullable();
            $table->boolean('get_his_salay')->default(0);
            $table->smallInteger('company_id')->nullable();
            $table->smallInteger('category_id')->nullable();
            $table->smallInteger('job_id')->nullable();
            $table->smallInteger('active')->default(1);
            $table->decimal('const_salary')->nullable();
            $table->decimal('salary')->nullable();
            $table->decimal('all_salary')->nullable();
            $table->string('due_date')->nullable();
            $table->integer('add_by');
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}