<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $req){
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password], true)) {
            $req->session()->regenerate();
            #dd(auth()->user());
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'err' => 'The provided credentials do not match our records.',
        ]);
    }
}
