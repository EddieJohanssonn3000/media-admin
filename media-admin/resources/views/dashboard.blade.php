@extends('layouts.app')
@section('content')

<h1>Dashboard</h1>

<p>Hello, {{ $user->name }}!</p>

<a href="/products">Go to Products</a>

<br><br>

<a href="/logout">Logout</a>

@endsection