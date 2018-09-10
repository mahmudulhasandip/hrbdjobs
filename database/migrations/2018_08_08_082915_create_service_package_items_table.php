<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_package_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_package_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('details')->nullable();
            $table->foreign('service_package_id')->references('id')->on('service_packages')->onDelete('cascade');
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
        Schema::dropIfExists('service_package_items');
    }
}
