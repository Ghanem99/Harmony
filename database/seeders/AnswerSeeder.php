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
                'answer' => 'Laravel',
                'score' => 10,
                'question_id' => 1,
            ],
            [
                'answer' => 'React',
                'score' => 5,
                'question_id' => 1,
            ],
            [
                'answer' => 'Vue',
                'score' => 3,
                'question_id' => 1,
            ],
            [
                'answer' => 'PHP',
                'score' => 10,
                'question_id' => 2,
            ],
            [
                'answer' => 'Python',
                'score' => 5,
                'question_id' => 2,
            ],
            [
                'answer' => 'Java',
                'score' => 3,
                'question_id' => 2,
            ],
            [
                'answer' => 'MySQL',
                'score' => 10,
                'question_id' => 3,
            ],
            [
                'answer' => 'PostgreSQL',
                'score' => 5,
                'question_id' => 3,
            ],
            [
                'answer' => 'SQLite',
                'score' => 3,
                'question_id' => 3,
            ],
        ];
        
        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
