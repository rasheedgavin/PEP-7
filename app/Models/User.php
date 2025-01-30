<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9

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

<<<<<<< HEAD
    public function players(): HasOne
    {
        return $this->hasOne(Player::class); 
    }
}
=======
    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'player_id');
    }

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9
