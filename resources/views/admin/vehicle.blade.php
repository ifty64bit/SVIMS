@extends('layouts.main')
@section('title', 'Vehicle Registration')
@section('body')
    <div class="mt-2">
        <div class="my-5">
            <h3 class="text-center">Please Fillup Vehicle Form</h3>
        </div>

        <form action="{{route("Vehicle.post")}}" method="POST">
            {{ csrf_field() }}
            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="owner_id" class="form-label">Owner id</label>
                    <input type="text" class="form-control" name="owner_id" id="owner_id" value="{{old('owner_id')}}">
                </div>
            </div>
            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" value="{{old('brand')}}">
                </div>
            <div class="col col-lg-5 col-xl-4">
             <label for="model" class="form-label">Model</label>
             <input type="text" class="form-control" name="model" id="model" value="{{old('model')}}">

            </div>
            <div class="col col-lg-5 col-xl-4">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="" {{ (old("type") == "" ? "selected":"") }}>Please Select</option>
                    <option value="2" {{ (old("type") == "2" ? "selected":"") }}>Car</option>
                    <option value="4" {{ (old("type") == "4" ? "selected":"") }}>Track</option>
                    <option value="3" {{ (old("type") == "3" ? "selected":"") }}>Bus</option>
                    <option value="1" {{ (old("type") == "1" ? "selected":"") }}>Motorcycle</option>
                    <option value="5" {{ (old("type") == "5" ? "selected":"") }}>CNG</option>
                </select>
            </div>

            <div class="row mb-3 justify-content-between">
                <div class="col col-lg-5 col-xl-4">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" name="color" id="color" value="{{old('color')}}">
                </div>
            </div>

                <div class="row mb-3 justify-content-between">
                    <div class="col col-lg-5 col-xl-4">
                        <label for="transmission" class="form-label">Transmission</label>
                        <input type="text" class="form-control" name="transmission" id="transmission" value="{{old('transmission')}}">
                    </div>
                </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col col-lg-5 col-xl-4">
                            <label for="doors" class="form-label">Door</label>
                            <input type="text" class="form-control" name="doors" id="doors" value="{{old('doors')}}">
                        </div>
                    </div>
                <div class="col col-lg-5 col-xl-4">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select name="fuel_type" id="fuel_type" class="form-control">
                        <option value="" {{ (old("fuel_type") == "" ? "selected":"") }}>Please Select</option>
                        <option value="Digel" {{ (old("fuel_type") == "Digel" ? "selected":"") }}>Digel</option>
                        <option value="patrol" {{ (old("fuel_type") == "patrol" ? "selected":"") }}>patrol</option>
                        <option value="CNG" {{ (old("fuel_type") == "CNG" ? "selected":"") }}>CNG</option>
                        <option value="Octen" {{ (old("fuel_type") == "Octen" ? "selected":"") }}>Octen</option>
                        <option value="Gas" {{ (old("fuel_type") == "Gas" ? "selected":"") }}>Gas</option>
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
