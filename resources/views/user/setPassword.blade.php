@extends('layouts.main')
@section('title','Set Password')
@section('body')
<div style="height: 75vh;" class="d-flex flex-column align-items-center justify-content-center">
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="mb-3">
                <h3>You are 1 more step close to use our system!!</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password" name="password_again" value="{{old('password_again')}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <input class="btn btn-primary" type="submit" value="Set Password">
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