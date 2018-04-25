<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('candidate_id')->unsigned();
            $table->string('company_name');
            $table->string('responsibility'); 
            $table->integer('candidate_designation')->unsigned();
            $table->string('company_designation');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('candidate_designation')->references('id')->on('job_designations');
        
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
        Schema::dropIfExists('candidate_experiences');
    }
}
