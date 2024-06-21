<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Breath;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreathController extends Controller
{
    public function index()
    {
        $breath = Breath::all();

        return response()->json($breath);
    }

    public function show(Breath $breath)
    {
        return response()->json($breath);
    }
}
