<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $p_name = Str::uuid()->toString().".".$req->file('photo')->extension();
        $req->file('photo')->move(public_path('uploads/profile_photo'),$p_name);

        $token = hash('sha256', time());

        $validated += ['role' => 'user', 'photo'=> $p_name, 'remember_token' => $token];

        User::create($validated);
        Mail::to($validated['email'])->send(new ConfirmationMail(
            ['name'=>$validated['first_name'], 'link'=>'http://localhost/verify/'.$token.'/'.$validated['email']]
        ));

        #return to dashboard
    }

    public function verify($token,$email){
        $user = User::where('remember_token', $token)->where('email',$email)->first();
        if(!$user){
            redirect('/login');
        }
        else{
            $user->email_verified_at = Carbon::now();
            $user->remember_token = "";
            $user->save();
            echo "Signup verified succesfully";
        }
    }
}
