<?php

namespace App\Http\Controllers\Api\V1\Survey;

use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class SurveyController extends Controller
{
    public function show($surveyId): Collection
    {
        $questions = Question::where('survey_id', $surveyId)->with('answers')->get();
        return $questions; // use QuestionResource to format the response
    }
}
