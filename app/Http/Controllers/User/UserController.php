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
        $user = User::where('id', $user_id)->get();
        return response()->json([
            'user' => $user
        ]);
    }

    public function update(Request $request, int $user_id) 
    {
        try {
            $user = User::where('id', $user_id)->get();

            if(!isset($user)){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error id'
                ], 401);
            }

            
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->password);
            $user->lastName = $request->input('lastName');
            $user->birthdate = $request->input('birthdate');
            $user->location = $request->input('location');
            $user->address = $request->input('address');
            $user->address_info = $request->input('address_info');
            $user->mobile_phone = $request->input('mobile_phone');
            $user->comment = $request->input('comment');
            $user->privacy_policy = $request->input('privacy_policy');
            $user->newsletters = $request->input('newsletters');
            $user->status = $request->input('status');
            $user->cp = $request->input('cp');
            

            if($user->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User Update Successfully'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function delete(int $user_id) 
    {
        $user = User::where('id', $user_id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'User Delete Successfully',
            'data' => $user
        ], 200);
    }
}
