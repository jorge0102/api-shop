<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\User\UserController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'createUser']);
    Route::post('login', [AuthController::class, 'loginUser']);
});

Route::group(['middleware' => ['auth:sanctum', 'status']], function () { 
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [UserController::class, 'getUser']);
        Route::get('all', [UserController::class, 'getUsers']);
        Route::post('{user_id}', [UserController::class, 'update']);
        Route::delete('{user_id}', [UserController::class, 'delete']);
    });
});



