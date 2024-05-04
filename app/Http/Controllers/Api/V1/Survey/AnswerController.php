<?php

namespace App\Http\Controllers\Api\V1\Survey;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(Question $question): LengthAwarePaginator
    {
        return $question->answers()->paginate(5);
    }

    public function store(Request $request, Question $question): Model
    {
        $answer = $question->answers()->create($request->all());

        return $answer;
    }
}
