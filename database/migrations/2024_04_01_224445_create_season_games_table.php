<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonGamesTable extends Migration
{
    public function up()
    {
        Schema::create('season_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user has many games
            $table->date('date');
            $table->integer('amount_of_games');
            $table->string('league');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('season_games');
    }
}