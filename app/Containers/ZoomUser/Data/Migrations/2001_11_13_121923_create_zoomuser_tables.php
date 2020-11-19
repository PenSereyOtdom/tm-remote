<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZoomuserTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('zoomusers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('email');
            $table->string('zoom_user_id');
            $table->unsignedInteger('company_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('zoomusers');
    }
}
