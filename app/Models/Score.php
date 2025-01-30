<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'player_id',
        'overall_score',
        'hangman_score',
        'text_twister_score',
        'interactive_novel_score'
    ];

    public function players(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
=======
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
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9
