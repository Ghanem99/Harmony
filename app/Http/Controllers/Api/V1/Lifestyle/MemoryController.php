<?php

namespace App\Http\Controllers\Api\V1\Lifestyle;

use App\Models\Memory;
use Illuminate\Http\Request;
use App\Models\Lifestyle\Habit;
use App\Http\Controllers\Controller;

class MemoryController extends Controller
{
    public function index() 
    {
        $memories = auth()->user()->habits()->memories()->paginate(10);

        return response()->json($memories); // ToDo: use MemoryResource
    }

    public function show(Habit $habit, Memory $memory) 
    {
        return response()->json($memory); // ToDo: use MemoryResource
    }
}
