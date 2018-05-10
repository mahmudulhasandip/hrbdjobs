<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_company_infos', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('employer_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('designation');
            $table->text('address');
            $table->text('billing_address');
            $table->string('website');
            $table->text('description');
            $table->integer('is_featured');
            $table->foreign('employer_id')->references('id')->on('employers');
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
        Schema::dropIfExists('employer_company_infos');
    }
}
