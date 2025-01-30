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
            $table->string('type');
            $table->unsignedBigInteger('player_id');
            $table->integer('score')->default(0);
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}