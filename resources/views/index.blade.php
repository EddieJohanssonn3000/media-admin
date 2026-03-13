@extends('layouts.app')
@section('content')

<h1>Login</h1>

<form method="POST" action="/login">
    @csrf  
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" 
        value="{{ old('email') }}"
        aria-invalid="{{ $errors->any() ? 'true' : 'false' }}">
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password"   aria-invalid="{{ $errors->any() ? 'true' : 'false' }}">
    </div>
    @if ($errors->any())
        <p role="alert" class="error-message">
            <span aria-hidden="true">⚠</span> {{ $errors->first() }}
        </p>
    @endif
    <button type="submit" class="btn">Login</button>
</form>

@endsection