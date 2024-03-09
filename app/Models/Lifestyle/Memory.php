<?php

namespace App\Models\Lifestyle;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Memory extends Model
{
    use HasFactory;
    protected $fillable = [
        'habit_id',
        'user_id',
        'image',
    ];

    public function user(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}

public function habit()
{
    return $this->belongsTo(Habit::class);
}



}
