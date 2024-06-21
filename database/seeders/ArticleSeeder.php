<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // title contonet and image and category_id and author

        $articles = [
            [
                'title' => 'Article 1',
                'content' => 'This is the first article',
                'image' => 'https://www.example.com/article1.jpg',
                'category_id' => 1,
                'author' => 'John Doe'
            ],
            [
                'title' => 'Article 2',
                'content' => 'This is the second article',
                'image' => 'https://www.example.com/article2.jpg',
                'category_id' => 2,
                'author' => 'Jane Doe'
            ],
            [
                'title' => 'Article 3',
                'content' => 'This is the third article',
                'image' => 'https://www.example.com/article3.jpg',
                'category_id' => 3,
                'author' => 'John Doe'
            ],
            [
                'title' => 'Article 4',
                'content' => 'This is the fourth article',
                'image' => 'https://www.example.com/article4.jpg',
                'category_id' => 4,
                'author' => 'Jane Doe'
            ],
            [
                'title' => 'Article 5',
                'content' => 'This is the fifth article',
                'image' => 'https://www.example.com/article5.jpg',
                'category_id' => 5,
                'author' => 'John Doe'
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
