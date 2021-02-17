<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreeEtatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entree_etat', function (Blueprint $table) {
            $table->unsignedInteger('entree_id');
            $table->unsignedInteger('etat_id');

            $table->unique(['entree_id','etat_id']);
            $table->foreign('entree_id')->references('id')->on('entrees')->onDelete('cascade');
            $table->foreign('etat_id')->references('id')->on('etats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entree_etat');
    }
}
