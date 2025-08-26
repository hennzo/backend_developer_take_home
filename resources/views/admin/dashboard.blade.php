@extends('layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col text-4xl">
            Welcome back {{ auth()->user()->firstname }}
        </div>
        
    </div>
@endsection