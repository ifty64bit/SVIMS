<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'phone' => ['required', 'numeric', 'min:10','unique:users'],
            'email' => ['required', 'email','unique:users'],
            'blood_group' => ['required'],
            'nid' => ['required', 'numeric'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $p_name = Str::uuid()->toString().".".$req->file('photo')->extension();
        $req->file('photo')->move(public_path('uploads/profile_photo'),$p_name);

        $token = hash('sha256', time());

        $validated += ['role' => 'user', 'remember_token' => $token];
        $validated['photo'] = $p_name;

        $user = new User();
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        $user->blood_group = $validated['blood_group'];
        $user->nid = $validated['nid'];
        $user->dob = $validated['dob'];
        $user->address = $validated['address'];
        $user->photo = $p_name;
        $user->remember_token = $token;
        $user->role='user';
        $user->save();
        Mail::to($validated['email'])->send(new ConfirmationMail(
            ['name'=>$validated['first_name'], 'link'=>'http://127.0.0.1:8000/verify/'.$token.'/'.$validated['email']]
        ));

        return redirect()->route('dashboard')->with(['success'=>"Success, User ".$validated['first_name']." Added"]);
    }

    public function verify($token,$email){
        $user = User::where('remember_token', $token)->where('email',$email)->first();
        if(!$user){
            return redirect('/');
        }
        return view('user.setPassword');
    }

    public function setPassword(Request $req){
        $req->validate([
            'old_password' => $req->has('old_password') ? 'required' : 'nullable',
            'password' => 'required|min:6',
            'password_again' => 'same:password'
        ]);

        $user = User::where('remember_token', $req->token)->where('email',$req->email)->first();

        if($req->has('old_password')){
            #password reset logic
        }
        else{
            $user->password = Hash::make($req->password);
            $user->email_verified_at = Carbon::now();
            $user->remember_token = "";
            $user->save();
            return redirect()->route('login');
        }
    }
}
