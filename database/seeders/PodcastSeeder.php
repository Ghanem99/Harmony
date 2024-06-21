<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // title and description and file link

        $podcasts = [
            [
                'title' => 'Podcast 1',
                'description' => 'This is the first podcast',
                'file' => 'https://www.example.com/podcast1.mp3',
                'image' => 'https://www.example.com/podcast1.jpg',
                'category_id' => 1
            ],
            [
                'title' => 'Podcast 2',
                'description' => 'This is the second podcast',
                'file' => 'https://www.example.com/podcast2.mp3',
                'image' => 'https://www.example.com/podcast2.jpg',
                'category_id' => 2
            ],
            [
                'title' => 'Podcast 3',
                'description' => 'This is the third podcast',
                'file' => 'https://www.example.com/podcast3.mp3',
                'image' => 'https://www.example.com/podcast3.jpg',
                'category_id' => 3
            ],
            [
                'title' => 'Podcast 4',
                'description' => 'This is the fourth podcast',
                'file' => 'https://www.example.com/podcast4.mp3',
                'image' => 'https://www.example.com/podcast4.jpg',
                'category_id' => 4
            ],
            [
                'title' => 'Podcast 5',
                'description' => 'This is the fifth podcast',
                'file' => 'https://www.example.com/podcast5.mp3',
                'image' => 'https://www.example.com/podcast5.jpg',
                'category_id' => 5
            ],
        ];

        foreach ($podcasts as $podcast) {
            \App\Models\Podcast::create($podcast);
        }
    }
}
