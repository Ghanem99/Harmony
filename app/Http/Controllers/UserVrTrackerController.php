<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserVrTracker;

class UserVrTrackerController extends Controller
{
    public function store($id) 
    {
        $tracker = new UserVrTracker();

        $tracker->user_id = $id;
        $tracker->score = request('score');
        $tracker->duration = request('duration');
        
        $tracker->save();

        // return with a 201 status code
        return response()->json([
            'status' => 'success',
            'message' => 'Tracker created successfully'
        ], 201);
    }
}
