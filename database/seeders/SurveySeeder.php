<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Survey::create([
            'title' => 'Diagnose Survey',
            'description' => 'This survey is used to diagnose the disease',
            'type' => 'diagnose'
        ]);
    }
}
