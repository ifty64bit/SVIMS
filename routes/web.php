<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

#User Controller
Route::controller(UserController::class)->group(function(){
    Route::get('/login',function(){
        return view('user.login');
    })->name('login');

    Route::post('/login', 'login');


    Route::get('/registration', function(){
        return view('user.registration');
    })->name('registration')->middleware('access:admin');

    Route::post('/registration', 'registration')->middleware('access:admin');

    Route::get('/verify/{token}/{email}', 'verify');

    
});

#Owner Controller
Route::controller(OwnerController::class)->group(function(){
    Route::get('/portal', function(){
        return view('index');
    })->name('portal')->middleware('access:user');
});

#Utility


Route::get('testMail', function(){
    $data = [
        'name' => 'Ifty',
        'link' => 'Test_Test'
    ];
     
    Mail::to('efte404@gmail.com')->send(new ConfirmationMail($data));
});
