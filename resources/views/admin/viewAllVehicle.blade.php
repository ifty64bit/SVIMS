@extends('layouts.main')
@section('title','Vehicles List')
@section('body')
<div class="mt-5 mb-3">
    <div>
        <h4>Vehicles List</h4>
    </div>
    @if (count($vehicles)==0)
        <div class="text-center">
            <h3>No vehicles Found</h3>
        </div>
        @else
        <table class="table table-bordered">
            <thead>
            <tr>

                <th scope="col">Owner Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Type</th>
                <th scope="col">Door</th>
                <th scope="col">Color</th>
                <th scope="col">Transmission</th>
                <th scope="col">Fuel Type</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{$vehicle['owner_id']}}</td>
                        <td>{{$vehicle['brand']}}</td>
                        <td>{{$vehicle['model']}}</td>
                        <td>{{$vehicle['type']}}</td>
                        <td>{{$vehicle['color']}}</td>
                        <td>{{$vehicle['doors']}}</td>
                        <td>{{$vehicle['transmission']}}</td>
                        <td>{{$vehicle['fuel_type']}}</td>
                        <td><a href="{{route('deleteVehicles',$vehicle['id'])}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
