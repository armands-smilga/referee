<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('game_date');
            $table->string('league');
            $table->time('start_time');
            $table->integer('number_of_games');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); // foreign key on user_id
        });
    }
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
