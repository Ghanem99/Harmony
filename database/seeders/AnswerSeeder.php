<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 1,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 1,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 2,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 2,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 3,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 3,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 4,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 4,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 5,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 5,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 6,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 6,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 7,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 7,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 8,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 8,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 9,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 9,
            ],
            [
                'answer' => 'Yes',
                'score' => 1,
                'question_id' => 10,
            ],
            [
                'answer' => 'No',
                'score' => 0,
                'question_id' => 10,
            ],
        ];
        
        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
