<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            // 1-Full-time
            // 2-Part-time
            // 3-Self-employed
            // 4-Freelance
            // 5-Contract
            // 6-Internship
            // 7-Apprenticeship
            $table->tinyInteger('employment_type');
            $table->string('company_name');
            $table->string('location');
            $table->tinyInteger('currently_working'); // 0-no 1-yes 
            $table->tinyInteger('start_month');
            $table->smallInteger('start_year');
            $table->tinyInteger('end_month');
            $table->smallInteger('end_year');
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
        Schema::dropIfExists('employee_experiences');
    }
}
