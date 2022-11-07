<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
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
    public function vehicleIndex(){
        return view("admin.vehicle");
     }
     public function vehiclePost(Request $req)
     {
        $validated = $req->validate([
            'owner_id'=>['required','numeric','min:1'],
            'brand' => ['required', 'string', 'min:3'],
            'model' => ['required', 'string', 'min:3'],
            'color' => ['required', 'string', 'min:3'],
            'type' => ['required'],
            'fuel_type' => ['required'],
            'doors' => ['required', 'numeric'],
            'transmission' => ['required', 'numeric'],

        ]);
        $vehicle = new Vehicle();
        $vehicle->owner_id = (int)$req->owner_id;
        $vehicle->brand =$req->brand;
        $vehicle->model =$req->model;
        $vehicle->type =(int)$req->type;
        $vehicle->color =$req->color;
        $vehicle->transmission =$req->transmission;
        $vehicle->doors =(int)$req->doors;
        $vehicle->fuel_type =$req->fuel_type;
        $vehicle->save();
       return redirect()->route ("viewAllVehicles");
     }
     public function viewAllVehicles(){
     return view("admin.viewAllVehicle",['vehicles'=>Vehicle::all()]);
     }
     public function deleteVehicles($id){
        $vehicle = Vehicle :: find($id);
        $vehicle ->delete();
        return redirect()->route ("viewAllVehicles");


     }
}
