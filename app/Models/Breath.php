<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breath extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'frequency',
        'video', 
        'image'
    ];
}
