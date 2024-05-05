<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VrSessionController extends Controller
{
    public function index()
    {
        return auth()->user()->sessions()->paginate(5);
    }

    public function show($id)
    {
        if (!auth()->user()->sessions()->find($id)) {
            return response()->json([
                'message' => 'Session not found'
            ], 404);
        }
        
        return auth()->user()->sessions()->findOrFail($id); // use CustomResource to return a custom response.
    }

    public function store(Request $request, User $user)
    {
        $session = $user->sessions()->create($request->all());

        return response()->json([
            'message' => 'Session created successfully',
            'data' => $session
        ], 201); // use CustomResource to return a custom response.
    }


}
