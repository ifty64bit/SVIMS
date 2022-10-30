@extends('layouts.main')
@section('title', 'Dashboard')
@section('body')
    <div class="mt-5 d-flex justify-content-around flex-wrap">
        <x-card>
            <x-slot:url>/registration</x-slot>
            <x-slot:title>Register</x-slot>
            <x-slot:desc>Register a new user to SVIMS</x-slot>
        </x-card>

        <x-card>
            <x-slot:url>/dashboard</x-slot>
            <x-slot:title>View All</x-slot>
            <x-slot:desc>View All Vehicle Owners</x-slot>
        </x-card>
    </div>
    @if(!empty(Session::get('success')))
    <x-toast>
        <x-slot:text>{{Session::get('success')}}</x-slot>
    </x-toast>
    @endif
@endsection