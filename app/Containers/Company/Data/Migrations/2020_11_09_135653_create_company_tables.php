<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            //$table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
