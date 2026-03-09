<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Media admin tool for managing products">
    <title>Media Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <header>
        <h1>Media Admin</h1>
    </header>
    @auth 
    @if(!request()->is('dashboard'))
    <nav aria-label="Main navigation">
        <ul>
            <li><a href="{{ route('products.index') }}">All Products</a></li>
            <li><a href="{{ route('products.create') }}">Add Product</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </nav>
    @endif
    @endauth

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Media Admin</p>
    </footer>
</body>
</html>