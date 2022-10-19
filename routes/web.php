<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/login',function(){
        return view('user.login');
    });
    Route::get('/registration', function(){
        return view('user.registration');
    });
});
