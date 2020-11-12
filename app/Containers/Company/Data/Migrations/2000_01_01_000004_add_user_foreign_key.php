<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUserForeignKey extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
    }
}
