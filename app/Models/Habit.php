<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
