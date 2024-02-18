<?php

namespace App\Models\Lifestyle;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'habit_id',
        'user_id',
        'title',
        'content'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        // Use Scope Classes
        static::addGlobalScope('user', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->id) {
                $builder->where('user_id', $user->id);
            }
        });
    }
}
