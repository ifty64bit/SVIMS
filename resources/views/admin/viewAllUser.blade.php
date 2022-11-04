@extends('layouts.main')
@section('title','Owners List')
@section('body')
<div class="mt-5 mb-3">
    <div>
        <h4>Owners List</h4>
    </div>
    @if (count($owners)==0)
        <div class="text-center">
            <h3>No User Found</h3>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">First Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Is Verified</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <th scope="row"><img src="{{ asset('uploads/profile_photo/'.$owner['photo'])}}" class="img-thumbnail" alt="profile" width="80"></th>
                        <td>{{$owner['first_name']}}</td>
                        <td>{{$owner['email']}}</td>
                        <td>{{$owner['phone']}}</td>
                        @if (empty($owner['email_verified_at']))
                            <td>Not Verified</td>
                        @else
                            <td>Verified</td>
                        @endif
                        <td><a href="/profile/{{$owner['id']}}">View Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection