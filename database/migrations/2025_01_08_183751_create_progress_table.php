<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->boolean('hangman_easy_complete')->default(false);
            $table->boolean('hangman_medium_complete')->default(false);
            $table->boolean('hangman_hard_complete')->default(false);
            $table->integer('hangman_easy_level')->default(0);
            $table->integer('hangman_medium_level')->default(0);
            $table->integer('hangman_hard_level')->default(0);
            $table->boolean('text_twister_easy_complete')->default(false);
            $table->boolean('text_twister_medium_complete')->default(false);
            $table->boolean('text_twister_hard_complete')->default(false);
            $table->integer('text_twister_easy_level')->default(0);
            $table->integer('text_twister_medium_level')->default(0);
            $table->integer('text_twister_hard_level')->default(0);
            $table->boolean('interactive_novel_easy_complete')->default(false);
            $table->boolean('interactive_novel_medium_complete')->default(false);
            $table->boolean('interactive_novel_hard_complete')->default(false);
            $table->integer('interactive_novel_easy_level')->default(0);
            $table->integer('interactive_novel_medium_level')->default(0);
            $table->integer('interactive_novel_hard_level')->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
