<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'isAdmin', 'section_id', 'student_id_number'
    ];

    protected $casts = [ 'email_verified_at' => 'datetime', ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'player_id');
    }

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}