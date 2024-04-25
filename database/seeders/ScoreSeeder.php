<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreSeeder extends Seeder
{
    public function run(): void
    {
        Score::create(['score' => 0, 'level' => 'Severe']);
        Score::create(['score' => 25, 'level' => 'Moderate']);
        Score::create(['score' => 50, 'level' => 'Mild']);
        Score::create(['score' => 75, 'level' => 'Low']);
        Score::create(['score' => 100, 'level' => 'None']);
    }
}
