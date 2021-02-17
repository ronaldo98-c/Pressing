<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->timestamp('dateEmbauche')->nullable();
            $table->timestamp('last_view')->nullable();
            //$table->timestamp('dateDepart')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('sexe')->nullable();
            $table->bigInteger('telephone')->unique()->nullable();
            $table->enum('role',['administrator','caissier','super-admin']);
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->unsignedInteger('pressing_id');
            $table->rememberToken();

            $table->foreign('pressing_id')->references('id')->on('pressing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
