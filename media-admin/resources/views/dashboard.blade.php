@extends('layouts.app')

@section('content')

<h2>Welcome, {{ $user->name }}!</h2>


<div class="dashboard-links">
    <a href="/products">Go to Products</a>
    <a href="/logout">Logout</a>
</div>

@endsection