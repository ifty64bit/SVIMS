<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->hasHeader('Authorization')) {
            return response("You must login first", 401);
        }
        $token = Token::where('token', $request->header('Authorization'))->with('user')->first();
        if (!$token) {
            return response("Invalid Token", 401);
        }
        if ($token->user->role == $role || $role == "both") {
            return $next($request->merge(['user' => $token]));
        }
        return response("Unauthorized", 401);
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // if (Auth::user()->role == $role || $role == "both") {
        //     return $next($request);
        // } else {
        //     if (Auth::user()->role == "admin") {
        //         return redirect()->route('dashboard');
        //     } else {
        //         return redirect()->route('portal');
        //     }
        // }
    }
}
