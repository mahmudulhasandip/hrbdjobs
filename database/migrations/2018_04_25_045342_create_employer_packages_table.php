<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_packages', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('employer_id')->unsigned();
            $table->integer('job_package_id')->unsigned();
            $table->integer('featured_package_id')->unsigned();
            $table->date('start_date');
            $table->date('expired_date');
            $table->integer('remain_amount');
            $table->integer('is_verified')->default(0);
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('job_package_id')->references('id')->on('job_packages');
            $table->foreign('featured_package_id')->references('id')->on('featured_packages');
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
        Schema::dropIfExists('employer_packages');
    }
}
