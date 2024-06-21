<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // title, duration, frequency, video, image
        $breath = [
            [
                'title' => 'Breath 1',
                'duration' => '5 minutes',
                'frequency' => 'Daily',
                'video' => 'https://www.example.com/breath1.mp4',
                'image' => 'https://www.example.com/breath1.jpg'
            ], 
            [
                'title' => 'Breath 2',
                'duration' => '10 minutes',
                'frequency' => 'Weekly',
                'video' => 'https://www.example.com/breath2.mp4',
                'image' => 'https://www.example.com/breath2.jpg'
            ],
            [
                'title' => 'Breath 3',
                'duration' => '15 minutes',
                'frequency' => 'Monthly',
                'video' => 'https://www.example.com/breath3.mp4',
                'image' => 'https://www.example.com/breath3.jpg'
            ],
            [
                'title' => 'Breath 4',
                'duration' => '20 minutes',
                'frequency' => 'Daily',
                'video' => 'https://www.example.com/breath4.mp4',
                'image' => 'https://www.example.com/breath4.jpg'
            ],
            [
                'title' => 'Breath 5',
                'duration' => '25 minutes',
                'frequency' => 'Weekly',
                'video' => 'https://www.example.com/breath5.mp4',
                'image' => 'https://www.example.com/breath5.jpg'
            ],
        ];

        foreach ($breath as $b) {
            \App\Models\Breath::create($b);
        }
    }
}
