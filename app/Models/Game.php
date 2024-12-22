<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'player_id', 'score'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}