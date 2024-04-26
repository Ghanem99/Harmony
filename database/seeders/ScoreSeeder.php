<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreSeeder extends Seeder
{
    public function run()
    {
        Score::create(['score' => 0, 'level' => 'Severe']);
        Score::create(['score' => 1, 'level' => 'Moderate']);
        Score::create(['score' => 2, 'level' => 'Mild']);
        Score::create(['score' => 3, 'level' => 'Low']);
        Score::create(['score' => 4, 'level' => 'None']);
    }
}
