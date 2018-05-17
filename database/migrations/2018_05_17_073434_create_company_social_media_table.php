<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_social_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_company_info_id')->unsigned();
            $table->string('fb_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('gplus_link')->nullable();
            $table->string('twitter_link')->nullable();
            // $table->string('gmap_link')->nullable();
            $table->foreign('employer_company_info_id')->references('id')->on('employer_company_infos');
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
        Schema::dropIfExists('company_social_media');

    }
}
