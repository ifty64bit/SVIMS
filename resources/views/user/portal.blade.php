@extends('layouts.main')
@section('title', 'Portal')
@section('body')
    <x-card>
        <x-slot:url>/profile</x-slot>
        <x-slot:title>Profile</x-slot>
        <x-slot:desc>View and update your profile</x-slot>
    </x-card>

    <x-card>
        <x-slot:url>/apply_fitness</x-slot>
        <x-slot:title>Fitness Checking</x-slot>
        <x-slot:desc>Apply for fitness checking schedule</x-slot>
    </x-card>
@endsection