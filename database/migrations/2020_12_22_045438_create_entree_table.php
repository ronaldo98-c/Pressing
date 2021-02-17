<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dateEntree');
            $table->integer('pu')->nullable();
            $table->double('poids')->nullable();
            $table->intteger('prixRepassage')->nullable();
            $table->double('pt');
            $table->string('type');
            $table->timestamp('dateSortie')->nullable();
            $table->integer('totalVetement');
            $table->integer('montantVerse')->nullable();
            $table->integer('montantRestant')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('client_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrees');
    }
}
