<?php

namespace App\Models;

use App\Models\Lifestyle\Habit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image'

    ];
    public function habit()
{
    return $this->belongsTo(Habit::class);
}

}
