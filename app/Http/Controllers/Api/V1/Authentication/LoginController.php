<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use Illuminate\Http\JsonResponse;
use App\Http\Resources\LoginResource;
use App\Http\Requests\LoginRequest;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ApiResponse;

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

        $data = new LoginResource(['token' => $token, 'user' => $user]);

        return ApiResponse::success('User Login Successfully', $data);
    }
}
