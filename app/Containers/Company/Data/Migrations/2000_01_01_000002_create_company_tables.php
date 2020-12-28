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
            $table->string('name')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('default_zoom_user_type')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            //$table->softDeletes();
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
