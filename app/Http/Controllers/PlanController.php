<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanController extends Controller
{
    public function generate()
    {
        $user = auth()->user();

        // Comment until AI models API is Hosted
        // $response = Http::post('https://api.openai.com/v1/generate_treatment_plan', [
        //     'prompt' => 'Generate a plan for user ' . $user,
        //     'max_tokens' => 150,
        //     'temperature' => 0.7,
        //     'top_p' => 1,
        //     'frequency_penalty' => 0,
        //     'presence_penalty' => 0,
        // ]);

        $plan = auth()->user()->plan()->create();

        $sections = [
            [
                'title' => 'Morning Routine',
                'types' => 'routine',
                'duration' => 30,
                'frequency' => 'daily',
                'link' => 'https://www.youtube.com/watch?v=Z2ZL6E7l9Kw'
            ],
            [
                'title' => 'Evening Routine',
                'types' => 'routine',
                'duration' => 30,
                'frequency' => 'daily',
                'link' => 'https://www.youtube.com/watch?v=Z2ZL6E7l9Kw'
            ],
            [
                'title' => 'Meditation',
                'types' => 'meditation',
                'duration' => 15,
                'frequency' => 'daily',
                'link' => 'https://www.youtube.com/watch?v=Z2ZL6E7l9Kw'
            ],
            [
                'title' => 'Workout',
                'types' => 'workout',
                'duration' => 45,
                'frequency' => 'daily',
                'link' => 'https://www.youtube.com/watch?v=Z2ZL6E7l9Kw'
            ],
            [
                'title' => 'Reading',
                'types' => 'reading',
                'duration' => 30,
                'frequency' => 'daily',
                'link' => 'https://www.youtube.com/watch?v=Z2ZL6E7l9Kw'
            ],
        ];

        foreach ($sections as $section) {
            $plan->sections()->create($section);
        }

        return response()->json([
            'message' => 'Plan generated successfully',
            'data' => $plan->load('sections')
        ], 201);
    }

    public function show()
    {
        return auth()->user()->plan()->with('sections')->first();
    }
}
