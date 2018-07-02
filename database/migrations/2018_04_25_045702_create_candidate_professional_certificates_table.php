<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateProfessionalCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_professional_certificates', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('candidate_id')->unsigned();
            $table->string('certification');
            $table->string('institution_name');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_time');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
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
        Schema::dropIfExists('candidate_professional_certificates');
    }
}
