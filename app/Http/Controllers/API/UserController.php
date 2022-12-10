<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
