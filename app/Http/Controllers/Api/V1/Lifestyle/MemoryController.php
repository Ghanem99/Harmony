<?php

namespace App\Http\Controllers\Api\V1\Lifestyle;

use App\Models\Memory;
use Illuminate\Http\Request;
use App\Models\Lifestyle\Habit;
use App\Http\Controllers\Controller;

class MemoryController extends Controller
{
    public function index(Habit $habit) 
    {
        $memories = $habit->memories()->paginate(10);

        return response()->json($memories); // ToDo: use MemoryResource
    }

    public function show(Habit $habit, Memory $memory) 
    {
        return response()->json($memory); // ToDo: use MemoryResource
    }

    public function store(Request $request, Habit $habit) 
    {
        $memory = $habit->memories()->create($request->all());

        return response()->json($memory); // ToDo: use MemoryResource
    }

    public function update(Request $request, Habit $habit, Memory $memory) 
    {
        $memory->update($request->all());

        return response()->json($memory); // ToDo: use MemoryResource
    }

    public function destroy(Habit $habit, Memory $memory) 
    {
        $memory->delete();

        return response()->json(null, 204);
    }
}
