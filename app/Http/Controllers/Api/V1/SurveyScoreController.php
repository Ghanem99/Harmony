<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Score;
use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SurveyScoreController extends Controller
{
    public function calculate(Survey $survey, Request $request): JsonResponse
    {
        $user = Auth::user();
        $answers = $request->input('answers');

        $totalScore = 0;
        foreach ($answers as $answer) {
            $selectedAnswer = Answer::where('answer', $answer['answer'])
                                    ->where('question_id', $answer['question_id'])
                                    ->first();
            if ($selectedAnswer) {
                $user->answers()->create([
                    'survey_id' => $survey->id,
                    'question_id' => $answer['question_id'],
                    'answer_id' => $selectedAnswer->id,
                ]);
                
                $totalScore += $selectedAnswer->score;
            } else {
                return response()->json(['error' => 'Answer not found'], 404);
            }
        }
        
        $level = Score::where('score', '<=', $totalScore)->orderBy('score', 'desc')->first()->level;

        $survey->score = $totalScore;
        $survey->save();

        return response()->json(['total_score' => $totalScore, 'level' => $level]);
    }

}
