<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('username')->unique();
            $table->string('designation')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('logo')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('verified')->default(false);
            $table->rememberToken();
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
        Schema::drop('employers');
    }
}
