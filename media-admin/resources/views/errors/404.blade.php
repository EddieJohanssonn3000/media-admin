@extends('layouts.app', ['hideNav' => true])

@section('content')

<div class="dashboard-content">
    <h2>404 - Page Not Found</h2>
    <p>The page you are looking for does not exist.</p>
    <div class="dashboard-links">
        <a href="{{ route('products.index') }}" class="btn-primary">Go to Products</a>
    </div>
</div>

@endsection