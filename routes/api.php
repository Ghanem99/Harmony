<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ChatController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\VrSessionController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\SurveyScoreController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Survey\SurveyController;
use App\Http\Controllers\Api\V1\Lifestyle\NoteController;
use App\Http\Controllers\Api\V1\Lifestyle\HabitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'auth:sanctum',
], function () {

    Route::delete('auth/logout/{token?}', [LogoutController::class, 'logout']);

    Route::apiResource('habits', HabitController::class);

    Route::apiResource('habits/{habit}/notes', NoteController::class);

    Route::get('surveys/{survey}', [SurveyController::class, 'show']);
    Route::post('surveys/{survey}/calculate', [SurveyScoreController::class, 'calculate']);

    Route::get('/chats', [ChatController::class, 'index']);
    Route::post('/chats', [ChatController::class, 'store']);

    Route::get('/sessions/{id}', [VrSessionController::class, 'show']);
    Route::post('/sessions', [VrSessionController::class, 'store']);
    Route::get('/sessions', [VrSessionController::class, 'index']);

    // to return the current auth user 
});

Route::apiResource('users', UserController::class);

Route::post('auth/register', [RegisterController::class, 'register'])
    ->middleware('guest:sanctum');

Route::post('auth/login', [LoginController::class, 'login'])
    ->middleware('guest:sanctum');

    Route::get('auth/me', function () {
        return auth()->user();
    });

