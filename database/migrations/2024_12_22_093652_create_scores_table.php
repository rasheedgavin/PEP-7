<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hangman_id')->nullable();
            $table->unsignedBigInteger('interactive_novel_id')->nullable();
            $table->unsignedBigInteger('text_twister_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hangman_id')->references('id')->on('games');
            $table->foreign('interactive_novel_id')->references('id')->on('games');
            $table->foreign('text_twister_id')->references('id')->on('games');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scores');
    }
}