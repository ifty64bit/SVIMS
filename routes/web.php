<?php

use App\Http\Controllers\AdminController;
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

    Route::get('/logout', 'logout')->name('logout');


    Route::get('/registration', function(){
        return view('user.registration');
    })->name('registration')->middleware('access:admin');

    Route::post('/registration', 'registration')->middleware('access:admin');

    Route::get('/verify/{token}/{email}', 'verify');
    Route::post('/verify/{token}/{email}', 'setPassword');

    
});

#Owner Controller
Route::controller(OwnerController::class)->group(function(){
    Route::get('/portal', function(){
        return view('index');
    })->name('portal')->middleware('access:user');
});

#Admin Controller
Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');
});

#Utility


Route::get('testMail', function(){
    $data = [
        'name' => 'Ifty',
        'link' => 'Test_Test'
    ];
     
    Mail::to('efte404@gmail.com')->send(new ConfirmationMail($data));
});
