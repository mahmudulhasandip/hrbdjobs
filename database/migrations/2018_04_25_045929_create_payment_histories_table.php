<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('employer_id')->unsigned();
            $table->integer('job_package_id')->unsigned()->nullable(); 
            $table->integer('featured_package_id')->unsigned()->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->string('transaction_type')->nullable();
            $table->string('transaction_id')->nullable();
            $table->date('transaction_date');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('job_package_id')->references('id')->on('job_packages')->onDelete('cascade');
            $table->foreign('featured_package_id')->references('id')->on('featured_packages')->onDelete('cascade');
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
        Schema::dropIfExists('payment_histories');
    }
}
