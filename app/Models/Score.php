<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [

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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
