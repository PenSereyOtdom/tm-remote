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
            $table->timestamp('finish_time')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->string('start_url',1000)->nullable();
            $table->string('password')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('meeting_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('zoomuser_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('zoomuser_id')->references('id')->on('zoomusers')->cascadeOnDelete();

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
