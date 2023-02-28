<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/user/all",
    *     tags={"Users"},
    *     summary="Obtener usuarios",
    *     description="Obtener usuarios",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los usuarios."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function getUsers() 
    {
        $users = User::get();
        return response()->json([
            'data' => $users
        ]);
    }

    /**
    * @OA\Get(
    *     path="/api/user/{user_id}",
    *     tags={"Users"},
    *     summary="Obtener usuario",
    *     description="Obtener usuario",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar usuario."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function getUser(int $user_id) 
    {
        $user = User::where('id', $user_id)->get();
        return response()->json([
            'data' => $user
        ]);
    }

    /**
    * @OA\Post(
    *     path="/api/user/{user_id}",
    *     tags={"Users"},
    *     summary="Actualizar usuario",
    *     description="Actualizar usuario",
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
    *                     property="lastName",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="birthdate",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="location",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="address",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="address_info",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="mobile_phone",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="comment",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="cp",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="privacy_policy",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="newsletters",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="status",
    *                     type="string"
    *                 ),
    *                 
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="OK",
    *         @OA\JsonContent(
    *            
    *             @OA\Examples(example="result", value={"status": true, "message": "User Update Successfully"}, summary="An result object.")
    *         )
    *     )
    * )
    */
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

    /**
     * @OA\Delete(
     *      path="/api/user/{user_id}",
     *      tags={"Users"},
     *      summary="Borrar usuario",
     *      description="Borrar usuario",
     *      @OA\Parameter(
     *          name="user_id",
     *          description="user id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="User Delete Successfully",
     *          @OA\JsonContent()
     *       )
     * )
     */
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
