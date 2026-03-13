@extends('layouts.app')

@section('content')

<div class="dashboard-content">
    <h2>Welcome, {{ $user->name }}!</h2>   
    <p>Here you find your tool for managing products like movies, games, vinyl records and books.</p>   
    <div class="dashboard-links">
        <a href="/products" class="btn">Go to Products</a>
        <a href="/logout" class="btn-secondary">Logout</a>
    </div>
</div>

@endsection