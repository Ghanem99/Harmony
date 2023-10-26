<?php 

namespace App\Http\Controllers;
use App\Models\User;

class UserController 
{
    public function index() 
    {
        return User::all();
    }

    public function show($id) 
    {
        return User::find($id);
    }

    public function store() 
    {
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        
        $user->save();
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