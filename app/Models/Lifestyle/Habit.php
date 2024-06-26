<?php

namespace App\Models\Lifestyle;

use App\Models\User;
use App\Models\Memory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'habits';

    protected $fillable = [
        'title',
        'user_id',
        'color',
        'icon',
        'repetition',
        'days',
        'once_in',
        'reminder',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function memories(): HasMany
    {
        return $this->hasMany(Memory::class);
    }
}
