@extends('layouts.main')
@section('title', $user['first_name']." :: Details")
@section('body')
<div class="mt-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{asset('uploads/profile_photo/'.$user['photo'])}}" alt="{{$user['first_name']}}" width="200" class="rounded-circle shadow">
    </div>
    <div class="bg-light mt-n5 py-5 px-3 shadow-sm rounded-2">
        <div class="mt-2 d-flex flex-column justify-content-center align-items-center">
            <div class=""><h4>Name : {{$user['first_name']." ".$user['last_name']}}</h4></div>
            <div class=""><h5>Email : {{$user['email']}}</h5></div>
            <div class=""><h5>Phone : {{$user['phone']}}</h5></div>
            <div class=""><h5>Address : {{$user['address']}}</h5></div>
            <div class=""><h5>Date of Birth : {{$user['dob']}}</h5></div>
            <div class=""><h5>NID Number : {{$user['nid']}}</h5></div>
            <div class=""><h5>Blood Group : {{$user['blood_group']}}</h5></div>
            <div class=""><h5>Join Date : {{$user['created_at']}}</h5></div>
            <div class=""><h5>Last Update : {{$user['updated_at']}}</h5></div>
            <div class="">
                <a href="#" class="btn btn-primary">Updaate Info</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection