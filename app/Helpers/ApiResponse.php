<?php 

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success(string $message, $data = null): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error(string $message): JsonResponse
    {
        return new JsonResponse([
            'status' => 'error',
            'message' => $message,
        ]);
    }
}