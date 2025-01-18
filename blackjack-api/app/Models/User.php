<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, HasUuids;
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'nickname',
        'email',
        'password',
        'wins',
        'losses',
        'ties',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'wins' => 'integer',
        'losses' => 'integer',
        'ties' => 'integer',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    // Mutator for game result. Mutators are called automatically when setting the value of an attribute on the model.
    // In this case, it's called when setting the game_result = 'result' attribute.
    public function setGameResultAttribute(string $result): void
    {
        if ($result === 'win') {
            $this->wins++;
        } elseif ($result === 'lose') {
            $this->losses++;
        } else {
            $this->ties++;
        }
    }
}
