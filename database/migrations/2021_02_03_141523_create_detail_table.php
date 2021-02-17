<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantite');
            $table->string('marque');
            $table->string('couleur');
            $table->string('repassage')->nullable();
            $table->unsignedInteger('categorie_id');
            $table->unsignedInteger('entree_id');

            $table->foreign('categorie_id')->references('id')->on('categorie');
            $table->foreign('entree_id')->references('id')->on('entrees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
