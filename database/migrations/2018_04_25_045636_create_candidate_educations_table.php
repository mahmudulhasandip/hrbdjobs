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
            $table->string('level_of_education')->nullable();
            $table->string('degree_title')->nullable();
            $table->decimal('gpa', 5, 2)->default(0);
            $table->decimal('out_of', 5, 2)->default(0);
            $table->string('group_majar')->nullable();
            $table->integer('institute_name_id')->unsigned();
            $table->string('achievement')->nullable();
            $table->integer('passing_year')->nullable();
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
