<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getAll()
    {
        return User::where('role', '=', 'user')->get();
    }

    public function getById($id)
    {
        return User::where('id', '=', $id)->first();
    }

    public function register(Request $req)
    {
        $validated = $req->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'numeric', 'min:10', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'blood_group' => ['required'],
            'nid' => ['required', 'numeric'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $p_name = Str::uuid()->toString() . "." . $req->file('photo')->extension();
        $req->file('photo')->move(public_path('uploads/profile_photo'), $p_name);
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
        $user->role = 'user';
        $user->save();

        Mail::to($validated['email'])->send(new ConfirmationMail(
            [
                'name' => $validated['first_name'],
                'link' => 'http://127.0.0.1:5173/verify/' . $token . '/' . $validated['email']
            ]
        ));
        return response($user, 200);
    }

    public function verify(Request $req)
    {
        $user = User::where('remember_token', $req->token)->where('email', $req->email)->first();
        if ($user) {
            return response($user, 200);
        } else {
            return response('Invalid_Token', 400);
        }
    }
    public function setPassword(Request $req)
    {
        $req->validate([
            'old_password' => $req->has('old_password') ? 'required' : 'nullable',
            'password' => 'required|min:4',
            'passwordAgain' => 'same:password'
        ]);

        $user = User::find($req->id);

        if ($req->has('old_password')) {
            #password reset logic
        } else {
            $user->password = Hash::make($req->password);
            $user->email_verified_at = Carbon::now();
            $user->remember_token = "";
            $user->save();

            return response("Passwords are Set", 200);
        }
    }
}
