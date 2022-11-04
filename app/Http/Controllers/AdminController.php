<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAllOwners(){
        return view('admin.viewAllUser')->with(['owners'=> User::all()->where('role','=', 'user')]);
    }
}
