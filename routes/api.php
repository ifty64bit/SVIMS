<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'getAll'])->middleware('access:admin');
Route::get('/users/user/{id}', [UserController::class, 'getById']);
Route::post('/users/user', [UserController::class, 'register']);
Route::post('/verify', [UserController::class, 'verify']);
Route::post('/users/user/{id}/setPassword', [UserController::class, 'setPassword']);
