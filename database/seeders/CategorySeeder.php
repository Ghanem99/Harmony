<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // more than one mental health categories
        $categories = [
            'Depression',
            'Anxiety',
            'Bipolar Disorder',
            'Schizophrenia',
            'Post-Traumatic Stress Disorder',
            'Obsessive-Compulsive Disorder',
            'Eating Disorders',
            'Attention-Deficit/Hyperactivity Disorder',
            'Autism Spectrum Disorder',
            'Personality Disorders',
            'Dissociative Disorders',
            'Impulse Control and Addiction Disorders', 
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
            ]);
        }
    }
}
