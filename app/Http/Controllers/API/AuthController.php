<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $user = User::where('email', $req->email)->with('token')->first();
        if ($user && Hash::check($req->password, $user->password)) {
            if ($user->token) {
                return response($user, 200);
            }
            $token = Str::random(64);
            $tokenDB = new Token();
            $tokenDB->user_id = $user->id;
            $tokenDB->token = $token;
            $tokenDB->createdAt = Carbon::now();
            $tokenDB->save();
            return response(User::where('email', $req->email)->with('token')->first(), 200);
        }
        return response("Invalid email or password", 400);
    }
}
