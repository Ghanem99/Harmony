<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use Illuminate\Http\JsonResponse;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\registerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiResponse;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request) : JsonResponse
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        
        $data = new RegisterResource(['user' => $user]);

        return ApiResponse::success('User Registered Successfully!', $data, 201);
    }
}
