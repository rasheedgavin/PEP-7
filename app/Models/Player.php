<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_picture',
        'username',
        'year_level',
        'section',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scores(): HasOne
    {
        return $this->hasOne(Score::class, 'player_id');
    }

    public function progress(): HasOne
    {
        return $this->hasOne(Progress::class, 'player_id');
    }
}
