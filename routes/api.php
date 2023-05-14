<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('posts', PostController::class);

    Route::get('/users', [UserController::class, 'index'])->middleware('can:view users_list');
    Route::post('/users/create', [UserController::class, 'create'])->middleware('can:create user');
    Route::get('/users/{user}', [UserController::class, 'show'])->middleware('can:edit articles');
    Route::put('/users/{user}', [UserController::class, 'update'])->middleware('can:edit articles');
    Route::delete('/users/{user}', [UserController::class, 'remove'])->middleware('can:delete user');
    Route::get('/user', [UserController::class, 'getUser']);
    
    Route::get('/roles', [RoleController::class, 'getRoles'])->middleware('can:view roles');
    Route::get('/role/{role}', [RoleController::class, 'getRole']);
    Route::put('/role/{role}', [RoleController::class, 'update'])->middleware('can:edit role');
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login']);
