@extends('layouts.main')
@section('title', $user['first_name']." :: Details")
@section('body')
<div class="modal" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Caution</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure want to delete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger">Yes</button>
        </div>
      </div>
    </div>
</div>
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
                <a href="{{route('edit', ['id'=>$user['id']])}}" class="btn btn-primary">Updaate Info</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection