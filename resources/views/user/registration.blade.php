@extends('layouts.main')
@section('title', 'Registration')
@section('body')
    <div class="mt-2">
        <div class="my-5">
            <h3 class="text-center">Please Fillup User The Form</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}">
                </div>
                <div class="col col-lg-5 col-xl-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col col-lg-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                </div>
                <div class="col col-lg-5 col-xl-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="nid" class="form-label">NID Number</label>
                    <input type="number" class="form-control" name="nid" id="nid" value="{{old('nid')}}">
                </div>
                <div class="col col-lg-5 col-xl-4">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
                </div>
            </div>

            <div class="row mb-5 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col col-lg-5 col-xl-4">
                    <label for="blood_group" class="form-label">Blood Group</label>
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option value="" {{ (old("blood_group") == "" ? "selected":"") }}>Please Select</option>
                        <option value="A+" {{ (old("blood_group") == "A+" ? "selected":"") }}>A+</option>
                        <option value="A-" {{ (old("blood_group") == "A-" ? "selected":"") }}>A-</option>
                        <option value="B+" {{ (old("blood_group") == "B+" ? "selected":"") }}>B+</option>
                        <option value="B-" {{ (old("blood_group") == "B-" ? "selected":"") }}>B-</option>
                        <option value="AB+" {{ (old("blood_group") == "AB+" ? "selected":"") }}>AB+</option>
                        <option value="AB-" {{ (old("blood_group") == "AB-" ? "selected":"") }}>AB-</option>
                        <option value="O+" {{ (old("blood_group") == "O+" ? "selected":"") }}>O+</option>
                        <option value="O-" {{ (old("blood_group") == "O-" ? "selected":"") }}>O-</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center">
                <input type="submit" class="btn btn-block btn-primary" value="Add">
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
@endsection