<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_skills', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('candidate_id')->unsigned();
            $table->integer('experience')->default(0); // 0 = fresher
            $table->integer('job_level')->unsigned()->nullable();
            $table->integer('job_status')->unsigned()->nullable();
            $table->integer('designation_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('expertise_area')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('job_designations')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('expertise_area')->references('id')->on('skills')->onDelete('cascade');
            $table->foreign('job_level')->references('id')->on('job_levels')->onDelete('cascade');
            $table->foreign('job_status')->references('id')->on('job_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('candidate_skills');
    }
}
