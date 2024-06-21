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
        $articles = [
            [
                'title' => 'How to Overcome Depression',
                'content' => 'Depression is a common mental health disorder that affects millions of people worldwide. It can be difficult to overcome, but with the right treatment and support, you can learn to manage your symptoms and live a fulfilling life. In this article, we will discuss some strategies for overcoming depression and improving your mental health.',
            ],
            [
                'title' => 'Tips for Managing Anxiety',
                'content' => 'Anxiety is a normal human emotion that everyone experiences from time to time. However, when anxiety becomes overwhelming and interferes with your daily life, it can be a sign of an anxiety disorder. In this article, we will discuss some tips for managing anxiety and reducing your symptoms.',
            ],
            [
                'title' => 'Understanding Bipolar Disorder',
                'content' => 'Bipolar disorder is a mental health condition that causes extreme mood swings, ranging from manic episodes of high energy to depressive episodes of sadness and hopelessness. It can be challenging to live with bipolar disorder, but with the right treatment and support, you can manage your symptoms and lead a fulfilling life. In this article, we will discuss the symptoms, causes, and treatment options for bipolar disorder.',
            ],
            [
                'title' => 'Coping with Schizophrenia',
                'content' => 'Schizophrenia is a serious mental health condition that affects how a person thinks, feels, and behaves. It can be challenging to cope with schizophrenia, but with the right treatment and support, you can manage your symptoms and live a fulfilling life. In this article, we will discuss some strategies for coping with schizophrenia and improving your mental health.',
            ],
            [
                'title' => 'Managing PTSD Symptoms',
                'content' => 'Post-traumatic stress disorder (PTSD) is a mental health condition that can develop after experiencing a traumatic event. It can be challenging to manage PTSD symptoms, but with the right treatment and support, you can learn to cope with your symptoms and live a fulfilling life. In this article, we will discuss some strategies for managing PTSD symptoms and improving your mental health.',
            ],
            [
                'title' => 'Coping with OCD',
                'content' => 'Obsessive-compulsive disorder (OCD) is a mental health condition that causes unwanted thoughts and repetitive behaviors. It can be challenging to cope with OCD'
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
