<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('employer_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->integer('job_category_id')->unsigned();
            $table->integer('job_designation_id')->unsigned();
            $table->integer('job_level_id')->unsigned();
            $table->integer('experience_id')->unsigned();
            $table->double('salary_min')->nullable();
            $table->double('salary_max')->nullable();
            $table->integer('is_negotiable')->default(0);
            $table->integer('vacancy')->nullable();
            $table->integer('gender')->default(0); // 0 == all, 1 == male, 2 == female, 3 == other
            $table->string('qualification');
            $table->date('deadline');
            $table->text('location');
            $table->integer('is_featured')->default(0);
            $table->integer('is_drafted')->default(0);
            $table->integer('is_verified')->default(0);
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('job_category_id')->references('id')->on('job_categories');
            $table->foreign('job_designation_id')->references('id')->on('job_designations');
            $table->foreign('experience_id')->references('id')->on('job_experiences');
            // $table->foreign('salary_range')->references('id')->on('salaries');
            $table->foreign('job_level_id')->references('id')->on('job_levels');
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
        Schema::dropIfExists('jobs');
    }
}
