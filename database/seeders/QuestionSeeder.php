<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Do you have a cough?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a fever?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a sore throat?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a headache?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a runny nose?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a shortness of breath?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a loss of taste or smell?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a body ache?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a fatigue?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a chills?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a nausea or vomiting?',
                'survey_id' => 1,
            ],
            [
                'question' => 'Do you have a diarrhea?',
                'survey_id' => 1,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
