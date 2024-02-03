<?php 

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        return User::all();
    }

    public function show($id) 
    {
        return User::find($id);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        

        return Response::json([
            'code' => 1,
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    public function update($id) 
    {
        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        
        $user->save();
    }

    public function destroy($id) 
    {
        $user = User::find($id);
        $user->delete();
    }
}