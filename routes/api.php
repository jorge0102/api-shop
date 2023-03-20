<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\BoxType\TypeController;
use App\Http\Controllers\Excluded\FruitsController;
use App\Http\Controllers\Excluded\VegetablesController;
use App\Http\Controllers\Frequency\FrequencyController;
use App\Http\Controllers\Kg\KgController;

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

   
    Route::group(['prefix' => 'excluded'], function () {
        Route::get('', [FruitsController::class, 'index']);
        Route::get('', [VegetablesController::class, 'index']);
    });

   
});

Route::group(['prefix' => 'frequency'], function () {
    Route::get('', [FrequencyController::class, 'index']);
});

Route::group(['prefix' => 'kg'], function () {
    Route::get('', [KgController::class, 'index']);
});

Route::group(['prefix' => 'box-type'], function () {
    Route::get('', [TypeController::class, 'index']);
});



