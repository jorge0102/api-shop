<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers() 
    {
        $users = User::get();
        return response()->json([
            'users' => $users
        ]);
    }

    public function getUser(int $user_id) 
    {
        $users = User::where('id', $user_id)->get();
        return response()->json([
            'users' => $users
        ]);
    }

    public function update() 
    {
        
    }

    public function create() 
    {
        
    }

    public function delete() 
    {
        
    }
}
