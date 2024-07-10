@extends('_voler.visitors.master')

@section('content')

{{-- <h1> Home </h1> --}}
<h2>Welcome! </h2>
{{-- <a href="{{ route('login') }}" class="btn btn-danger">Operator Login</a> --}}
<a href="{{ route('trader.login') }}" class="btn btn-danger">Login Here</a>
@endsection