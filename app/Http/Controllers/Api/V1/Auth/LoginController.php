<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request) : JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!($user && Hash::check($request->password, $user->password))) {
            return ApiResponse::error('Invalid Credentials', null);
        }

        $device_name = $request->post('device_name', $request->userAgent());
        $token = $user->createToken($device_name);

        return new JsonResponse([
            'token' => $token->plainTextToken,
            'user' => new LoginResource($user),
        ]);
    }
}
