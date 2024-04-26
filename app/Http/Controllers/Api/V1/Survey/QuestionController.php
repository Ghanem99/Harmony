<?php

namespace App\Http\Controllers\Api\V1\Survey;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Survey $survey): LengthAwarePaginator
    {
        return $survey->questions()->paginate(5);
    }

    public function store(Request $request, Survey $survey): Model
    {
        $question = $survey->questions()->create($request->all());
        return $question;
    }
}
