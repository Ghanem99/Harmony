<?php

namespace App\Http\Controllers\Api\V1\Survey;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(): Collection
    {
        return Survey::all();
    }

    public function show(Survey $survey): Survey
    {
        return $survey;
    }
    public function store(Request $request)
    {
        return Survey::create($request->all());
    }
}
