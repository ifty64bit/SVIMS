@extends('layouts.main')
@section('title', $user['first_name']." :: Edit Details")
@section('body')
<div class="mt-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{asset('uploads/profile_photo/'.$user['photo'])}}" alt="{{$user['first_name']}}" width="200" class="rounded-circle shadow">
    </div>
    <div class="bg-light mt-n5 py-5 px-3 shadow-sm rounded-2">
        <form class="mt-2 d-flex flex-column justify-content-center align-items-center" action="" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-6">
                    <p>First Name <input type="text" class="form-control" name="first_name" value="{{empty(old('first_name')) ? $user['first_name'] : old('first_name')}}"/></p>
                </div>
                <div class="col-6">
                    <p>Last Name <input type="text" class="form-control" name="last_name" value="{{empty(old('last_name')) ? $user['last_name'] : old('last_name')}}"/></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Email <input type="text" class="form-control" name="email" value="{{empty(old('email')) ? $user['email'] : old('email')}}"/> </p>
                </div>
                <div class="col-6">
                    <p>Phone <input type="text" class="form-control" name="phone" value="{{empty(old('phone')) ? $user['phone'] : old('phone')}}"/></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Address <input type="text" class="form-control" name="address" value="{{empty(old('address')) ? $user['address'] : old('address')}}"/></p>
                </div>
                <div class="col-6">
                    <p>Date of Birth <input type="date" class="form-control" name="dob" value="{{empty(old('dob')) ? $user['dob'] : old('dob')}}"/></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>NID Number <input type="text" class="form-control" name="nid" value="{{empty(old('nid')) ? $user['nid'] : old('nid')}}"/></p>
                </div>
                <div class="col-6">
                    <p>Blood Group 
                        <select name="blood_group" id="blood_group" class="form-control">
                            <option value="A+" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="A+"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "A+" ? "selected":"") }}
                            @endif>A+</option>
                            <option value="A-" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="A-"? "selected" : ""}}
                             @else
                                {{ (old("blood_group") == "A-" ? "selected":"") }}
                            @endif>A-</option>
                            <option value="B+" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="B+"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "B+" ? "selected":"") }}
                            @endif>B+</option>
                            <option value="B-" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="B-"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "B-" ? "selected":"") }}
                            @endif>B-</option>
                            <option value="AB+" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="AB+"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "AB+" ? "selected":"") }}
                            @endif>AB+</option>
                            <option value="AB-" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="AB-"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "AB-" ? "selected":"") }}
                            @endif>AB-</option>
                            <option value="O+" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="O+"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "O+" ? "selected":"") }}
                            @endif>O+</option>
                            <option value="O-" @if (empty(old('blood_group')))
                                {{$user['blood_group']=="O-"? "selected" : ""}}
                            @else
                                {{ (old("blood_group") == "O-" ? "selected":"") }}
                            @endif>O-</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="">
                <input type="submit" class="btn btn-primary" value="Updaate Info">
            </div>
            <div class="row justify-content-center">
                @if ($errors->any())
                    <div class="mt-4 alert alert-danger" role="alert">
                    @foreach ($errors->all() as $err)
                        <p>{{$err}}</p>
                    @endforeach
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection