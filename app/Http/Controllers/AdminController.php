<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAllOwners(){
        return view('admin.viewAllUser')->with(['owners'=> User::all()->where('role','=', 'user')]);
    }

    public function userProfileEdit(Request $req){
        $validated = $req->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'email'],
            'blood_group' => ['required'],
            'nid' => ['required', 'numeric'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
        
        $user = User::find($req->id);
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->blood_group = $req->blood_group;
        $user->nid = $req->nid;
        $user->dob = $req->dob;
        $user->address = $req->address;
        $user->save();
        return redirect("/profile/".$req->id);
    }
}
