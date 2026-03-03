<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Media Admin</title>
</head>
<body>
    <header>
        <h1>Media Admin</h1>
    </header>
    <nav>
        <ul>
            <li><a href="{{ route('products.index') }}">All Products</a></li>
            <li><a href="{{ route('products.create') }}">Add Product</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>
            &copy; {{ date ('Y') }} Media Admin
        </p>
    </footer>

    
</body>
</html>