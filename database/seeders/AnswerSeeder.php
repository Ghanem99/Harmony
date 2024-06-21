<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        $answers = [
            // Question 1
            [
                ['answer' => 'None', 'score' => 0],
                ['answer' => '0-1 Hour/daily', 'score' => 1],
                ['answer' => '1-3 Hours/daily', 'score' => 2],
                ['answer' => '3-8 Hours/daily', 'score' => 3],
                ['answer' => 'More than 8 hours daily', 'score' => 4]
            ],
            // Question 2
            [
                ['answer' => 'No conflict', 'score' => 0],
                ['answer' => 'Slight conflict', 'score' => 1],
                ['answer' => 'Moderate conflict', 'score' => 2],
                ['answer' => 'Partial conflict', 'score' => 3],
                ['answer' => 'Severe conflict', 'score' => 4]
            ],
            // Question 3
            [
                ['answer' => 'None', 'score' => 0],
                ['answer' => 'Mild', 'score' => 1],
                ['answer' => 'Moderate', 'score' => 2],
                ['answer' => 'Severe', 'score' => 3],
                ['answer' => 'Causes persistent impairment', 'score' => 4]
            ],
            // Question 4
            [
                ['answer' => 'Always trying', 'score' => 0],
                ['answer' => 'Trying most of the time', 'score' => 1],
                ['answer' => 'Trying occasionally', 'score' => 2],
                ['answer' => 'Rarely trying', 'score' => 3],
                ['answer' => 'Never trying', 'score' => 4]
            ],
            // Question 5
            [
                ['answer' => 'Complete control', 'score' => 0],
                ['answer' => 'Almost complete control', 'score' => 1],
                ['answer' => 'Moderate control', 'score' => 2],
                ['answer' => 'Limited control', 'score' => 3],
                ['answer' => 'No control', 'score' => 4]
            ],
        ];

        $questions = Question::all();

        foreach ($questions as $key => $question) {
            foreach ($answers[$key] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer['answer'],
                    'score' => $answer['score']
                ]);
            }
        }
    }
}

