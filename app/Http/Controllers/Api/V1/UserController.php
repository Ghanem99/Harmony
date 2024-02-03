<?php 

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Helpers\ApiResponse;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index() : JsonResponse
    {
        $users = User::all();
        $userResource = UserResource::collection($users);

        return ApiResponse::success('Data Retrieved Successfully!', $userResource, 200);
    }

    public function show(User $user) : JsonResponse
    {
        if (!$user) {
            return ApiResponse::error('User Not Found!', 404);
        }

        $userResource = new UserResource($user);
        return ApiResponse::success('User Retrieved Successfully!', $userResource, 200);
 
    }

    public function update(User $user, UpdateUserRequest $request) : JsonResponse
    {
        try {
            if (auth()->guard('sanctum')->user()->id !== $user->id) {
                return ApiResponse::error('Unauthorized action. You cannot update this user.', 403);
            }

            $user->update($request->all());

            $updatedUser = User::find($user->id);

            $userResource = new UserResource($updatedUser);

            return ApiResponse::success('User Updated Successfully!', $userResource, 200);

        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update user!', 404);
        }
    }

    public function destroy($id) : JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            
            // No return happens here, which is correct for a 204 response
            return ApiResponse::success('User Deleted Successfully!', null, 204);
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ApiResponse::error('User Not Found!', 404);
        }
    }
}