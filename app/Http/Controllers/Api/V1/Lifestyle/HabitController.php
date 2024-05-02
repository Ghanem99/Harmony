<?php

namespace App\Http\Controllers\Api\V1\Lifestyle;

use App\Http\Controllers\Controller;

use App\Http\Requests\V1\Lifestyle\StoreHabitRequest;
use App\Http\Resources\HabitCollection;
use App\Http\Resources\HabitResource;
use App\Models\Lifestyle\Habit;
use Illuminate\Http\JsonResponse;

class HabitController extends Controller
{
    public function index(): JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $user = auth()->user();
        $habits = $user->habits()->paginate();

        if ($habits->isEmpty()) {
            return new JsonResponse(['message' => 'No Habits Found!']);
        }

        return HabitResource::collection($habits);
    }

    public function show(Habit $habit): HabitResource
    {
        return new HabitResource($habit);
    }

    public function store(StoreHabitRequest $request): HabitResource
    {
        $habit = auth()->user()->habits()->create($request->validated());

        return new HabitResource($habit);
        
    }

    public function update(Habit $habit, StoreHabitRequest $request)
    {
        $habit->update($request->all());

        return new HabitResource($habit);
    }

    public function destroy(Habit $habit): JsonResponse
    {
        $habit->delete();

        return new JsonResponse(['message' => 'Habit deleted Successfully!']);
    }
}
