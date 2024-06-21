<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lifestyle\Note;
use App\Models\Lifestyle\Habit;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function habits(): HasMany
    {
        return $this->hasMany(Habit::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class);
    }

    public function chat(): HasOne
    {
        return $this->hasOne(Chat::class);
    }

    public function memories(): HasMany
    {
        return $this->hasMany(Memory::class);
    }
    
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function canAccessPanel(): bool
    {
        // return $this->hasRole('Admin');
        return true;
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class);
    }
}
