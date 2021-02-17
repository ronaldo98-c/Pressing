<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('sexe');
            $table->bigInteger('telephone')->unique();
            $table->timestamp('dateJour');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('remise_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('remise_id')->references('id')->on('remise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
