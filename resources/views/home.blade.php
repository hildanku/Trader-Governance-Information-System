@extends('_voler.layout.master')

@section('content')
@php
    // Check if the user is authenticated
    if (Auth::guard('web')->check()) {
        // Redirect to operator dashboard if the user is an operator
        header("Location: " . route('operator.dashboard'));
        exit;
    } elseif (Auth::guard('userCred')->check()) {
        // Redirect to trader dashboard if the user is a trader

        header("Location: " . route('trader.dashboard'));
        exit;
    }
@endphp
{{-- <h1> Home </h1> --}}
<h2>Welcome! </h2>
{{-- <a href="{{ route('login') }}" class="btn btn-danger">Operator Login</a> --}}
<a href="{{ route('trader.login') }}" class="btn btn-danger">Login Here</a>
@endsection