<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\registerRequest;
use App\Http\Resources\RegisterResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request) : RegisterResource
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return new RegisterResource($user);
    }
}
