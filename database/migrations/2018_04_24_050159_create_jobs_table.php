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
            $table->integer('employer_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('job_category_id')->unsigned()->nullable();
            $table->integer('job_designation_id')->unsigned()->nullable();
            $table->integer('job_level_id')->unsigned()->nullable();
            $table->integer('experience')->unsigned()->nullable();
            $table->double('salary_min')->nullable();
            $table->double('salary_max')->nullable();
            $table->integer('is_negotiable')->default(0);
            $table->integer('vacancy')->nullable();
            $table->integer('gender')->default(0); // 0 == all, 1 == male, 2 == female, 3 == other
            $table->string('qualification')->nullable();
            $table->date('deadline')->nullable();
            $table->text('location')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('is_drafted')->default(0);
            $table->integer('is_verified')->default(0);
            $table->integer('is_paused')->default(0);
            
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('job_designation_id')->references('id')->on('job_designations')->onDelete('cascade');
            // $table->foreign('experience_id')->references('id')->on('job_experiences')->onDelete('cascade');
            // $table->foreign('salary_range')->references('id')->on('salaries');
            $table->foreign('job_level_id')->references('id')->on('job_levels')->onDelete('cascade');

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
        Schema::dropIfExists('jobs');
    }
}
