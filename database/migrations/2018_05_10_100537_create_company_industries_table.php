<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_industries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_company_info_id')->unsigned();
            $table->integer('industry_id')->unsigned();
            $table->foreign('industry_id')->references('id')->on('industries');
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
        Schema::dropIfExists('company_industries');
    }
}
