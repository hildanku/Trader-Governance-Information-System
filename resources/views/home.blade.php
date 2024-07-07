@extends('_voler.visitors.master')

@section('content')

<h1> Home </h1>
<a href="{{ route('login') }}" class="btn btn-danger">Operator Login</a>
<a href="{{ route('trader.login') }}" class="btn btn-danger">Trader Login</a>
@endsection