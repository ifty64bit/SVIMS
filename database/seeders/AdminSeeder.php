<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>'Ifty',
            'last_name'=>'Islam',
            'email'=>'ifty64bit@gmail.com',
            'photo'=>'ffffff.png',
            'phone'=>'01789843661',
            'password'=>Hash::make('123456'),
            'blood_group'=>'O+',
            'nid'=>'10203040',
            'dob'=>'07/11/2000',
            'address'=>'Dhaka',
            'role'=>'admin'
        ]);
    }
}
