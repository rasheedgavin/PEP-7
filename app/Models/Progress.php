<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    protected $fillable = [
        'player_id',
        'hangman_easy_complete', 
        'hangman_medium_complete', 
        'hangman_hard_complete', 
        'hangman_easy_level', 
        'hangman_medium_level', 
        'hangman_hard_level',
        'text_twister_easy_complete', 
        'text_twister_medium_complete', 
        'text_twister_hard_complete', 
        'text_twister_easy_level', 
        'text_twister_medium_level', 
        'text_twister_hard_level',
        'interactive_novel_easy_complete', 
        'interactive_novel_medium_complete', 
        'interactive_novel_hard_complete', 
        'interactive_novel_easy_level', 
        'interactive_novel_medium_level', 
        'interactive_novel_hard_level'
    ];

    public function hangman_level_unlocked($category, $level)
    {
        $currentLevelKey = "hangman_{$category}_level";
        return $this->{$currentLevelKey} >= $level - 1;
    }

    public function text_twister_level_unlocked($category, $level)
    {
        $currentLevelKey = "text_twister_{$category}_level";
        return $this->{$currentLevelKey} >= $level - 1;
    }

    public function interactive_novel_level_unlocked($category, $level)
    {
        $currentLevelKey = "interactive_novel_{$category}_level";
        return $this->{$currentLevelKey} >= $level - 1;
    }


    public function players(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}

