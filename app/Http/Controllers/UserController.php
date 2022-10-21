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
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'err' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration(Request $req){
        $validated = $req->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'email'],
            'blood_group' => ['required'],
            'nid' => ['required', 'numeric'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
        
        dd($validated);
    }
}
