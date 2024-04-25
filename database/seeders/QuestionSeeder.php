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
                'name' => 'first question?',
                'survey_id' => 1,
            ],
            [
                'name' => 'second question?',
                'survey_id' => 1,
            ],
            [
                'name' => 'third question?',
                'survey_id' => 1,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
