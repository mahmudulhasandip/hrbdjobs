<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('type')->default(0); // 0 for university name, 1 for college, 2 for school
            $table->integer('verified')->default(1);
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
        Schema::dropIfExists('institute_names');
    }
}
