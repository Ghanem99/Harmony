<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\ScoreController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\SurveyScoreController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
<<<<<<< HEAD
use App\Http\Controllers\Api\V1\Lifestyle\HabitController;
use App\Http\Controllers\Api\V1\Lifestyle\MemoriesController;
=======
use App\Http\Controllers\Api\V1\Survey\AnswerController;
use App\Http\Controllers\Api\V1\Survey\SurveyController;
>>>>>>> upstream/main
use App\Http\Controllers\Api\V1\Lifestyle\NoteController;
use App\Http\Controllers\Api\V1\Lifestyle\HabitController;
use App\Http\Controllers\Api\V1\Survey\QuestionController;

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
    Route::apiResource('images', MemoriesController::class);

    Route::apiResource('habits/{habit}/notes', NoteController::class);

    Route::get('surveys/{survey}', [SurveyController::class, 'show']);
    Route::post('surveys/{survey}/calculate', [SurveyScoreController::class, 'calculate']);

});

Route::apiResource('users', UserController::class);

Route::post('auth/register', [RegisterController::class, 'register'])
    ->middleware('guest:sanctum');

Route::post('auth/login', [LoginController::class, 'login'])
    ->middleware('guest:sanctum');

<<<<<<< HEAD
//Route::post('/images', [MemoriesController::class, 'store']);
//Route::delete('/images/{id}', [MemoriesController::class, 'destroy']);
//Route::get('/images', [MemoriesController::class, 'index']);
//Route::put('/images/{id}', [MemoriesController::class, 'update']);
//Route::get('/images/{id}', [MemoriesController::class, 'show']);
=======
>>>>>>> upstream/main
