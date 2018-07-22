<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_educations', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('candidate_id')->unsigned();
            $table->string('level_of_education');
            $table->string('degree_title');
            $table->decimal('gpa', 5, 2);
            $table->decimal('out_of', 5, 2);
            $table->string('group_majar')->nullable();
            $table->integer('institute_name_id')->unsigned();
            $table->integer('passing_year');
            $table->string('achievement')->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('institute_name_id')->references('id')->on('institute_names')->onDelete('cascade');
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
        Schema::dropIfExists('candidate_educations');
    }
}
