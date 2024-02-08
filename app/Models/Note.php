<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'habit_id', 
        'user_id', 
        'title', 
        'content'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->id) {
                $builder->where('user_id', $user->id);
            }
        });
    }
}
