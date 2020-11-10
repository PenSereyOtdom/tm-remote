<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZoomTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('zooms', function (Blueprint $table) {

            $table->increments('id');
            $table->string('topic')->nullable();
            $table->string('join_url')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->string('password')->nullable();
            $table->string('note')->nullable();
            $table->unsignedInteger('user_id');

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
        Schema::dropIfExists('zooms');
    }
}
