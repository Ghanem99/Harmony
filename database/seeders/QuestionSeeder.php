<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question' => 'How much time is spent on compulsive actions?',
                'survey_id' => 1,
                'image_path' => 'assets/images/11.png',
            ],
            [
                'question' => 'To what extent do compulsive thoughts conflict with daily activities, social life, and work?',
                'survey_id' => 1,
                'image_path' => 'assets/images/12.png',
            ],
            [
                'question' => 'How much distress do you feel if prevented from engaging in compulsive activities?',
                'survey_id' => 1,
                'image_path' => 'assets/images/13.png',
            ],
            [
                'question' => 'How much effort do you make to resist engaging in compulsive acts?',
                'survey_id' => 1,
                'image_path' => 'assets/images/14.png',
            ],
            [
                'question' => 'What is your level of control over your compulsive behaviors?',
                'survey_id' => 1,
                'image_path' => '',
            ],
        ];

        foreach ($questions as $question) {
            Question::create([
                'question' => $question['question'],
                'survey_id' => $question['survey_id'],
                'image_path' => $question['image_path']
            ]);
        }
    }
}