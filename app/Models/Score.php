<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hangman_id', 'interactive_novel_id', 'text_twister_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hangman(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'hangman_id');
    }

    public function interactiveNovel(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'interactive_novel_id');
    }

    public function textTwister(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'text_twister_id');
    }
}