<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
  
     /**
    * @OA\Post(
    *     path="/auth/register",
    *     summary="Registrase",
    *     @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="name",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="email",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password",
    *                     type="string"
    *                 ),
    *                 example={"name": "name", "email": "prueba", "password": "prueba"}
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="OK",
    *         @OA\JsonContent(
    *            
    *             @OA\Examples(example="result", value={"status": true, "message": "User Logged In Successfully", "token": "Bearer 21fdas21fga2sd1f"}, summary="An result object.")
    *         )
    *     )
    * )
    */
    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'lastName' => 'required',
                'birthdate' => 'required',
                'location' => 'required',
                'address' => 'required',
                'address_info' => 'required',
                'mobile_phone' => 'required',
                'comment' => 'required',
                'cp' => 'required',
                'privacy_policy' => 'required',
                'newsletters' => 'required',
                'password' => 'required',
                'status' => 'required',
                'role_id' => 'required|exists:roles,id'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->password),
                'lastName' => $request->input('lastName'),
                'birthdate' => $request->input('birthdate'),
                'location' => $request->input('location'),
                'address' => $request->input('address'),
                'address_info' => $request->input('address_info'),
                'mobile_phone' => $request->input('mobile_phone'),
                'comment' => $request->input('comment'),
                'privacy_policy' => $request->input('privacy_policy'),
                'newsletters' => $request->input('newsletters'),
                'status' => $request->input('status'),
                'cp' => $request->input('cp')
            ]);

            if($user->save()) {
                $role = Role::where('id', $request->role_id)->first();
                $user->roles()->attach($role);

                return response()->json([
                    'status' => true,
                    'message' => 'User Created Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
    * @OA\Post(
    *     path="/auth/login",
    *     summary="Login",
    *     @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="email",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password",
    *                     type="string"
    *                 ),
    *                 example={"email": "prueba", "password": "prueba"}
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="OK",
    *         @OA\JsonContent(
    *            
    *             @OA\Examples(example="result", value={"status": true, "message": "User Logged In Successfully", "token": "Bearer 21fdas21fga2sd1f"}, summary="An result object.")
    *         )
    *     )
    * )
    */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}