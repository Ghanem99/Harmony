<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HabitRequest;
use App\Http\Requests\UpdateHabitRequest;
use App\Http\Resources\HabitResource;
use App\Http\Resources\HabitCollection;
use App\Models\Habit;
use Illuminate\Http\JsonResponse;

class HabitController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        $habits = $user->habits()->paginate();

        if ($habits->isEmpty()) {
            return new JsonResponse(['message' => 'No Habits Found!']);
        }
        
        return HabitResource::collection($habits);
    }

    public function show(Habit $habit) 
    {
        return new HabitResource($habit);
    }

    public function store(HabitRequest $request) 
    {
        $habit = auth()->user()->habits()->create($request->validate());

        return new HabitResource($habit);
    }

    public function update(Habit $habit, UpdateHabitRequest $request) 
    {
        $habit->update($request->all());

        return new HabitResource($habit);
    }

    public function destroy(Habit $habit) 
    {
        $habit->delete();

        return new JsonResponse(['message' => 'Habit deleted Successfully!']);
    }
}
