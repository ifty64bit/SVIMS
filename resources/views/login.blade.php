@extends('layouts.main')
@section('title', 'Login')
@section('body')
    <div style="height: 75vh;" class="d-flex flex-column align-items-center justify-content-center">
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="row justify-content-center">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" is-invalid value="{{old('name')}}">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                </div>
            </div>
            <div class="row">
                <input class="btn btn-primary" type="submit" value="Login">
            </div>
        </form>
        
        @if ($errors->any())
            <div class="mt-4 alert alert-danger" role="alert">
                @foreach ($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection