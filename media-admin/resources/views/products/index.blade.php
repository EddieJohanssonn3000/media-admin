<h1>Products</h1>

<form method="GET" action="{{ route('products.index') }}">
    <label for="type">Filter by Type:</label>

    <select name="type" id="type">
        <option value="">All</option>
        <option value="movie" {{ request('type') == 'movie' ? 'selected' : '' }}>Movie</option>
        <option value="game" {{ request('type') == 'game' ? 'selected' : '' }}>Game</option>
        <option value="vinyl" {{ request('type') == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
        <option value="book" {{ request('type') == 'book' ? 'selected' : '' }}>Book</option>
    </select>

    <button type="submit">Filter</button>
</form>

<a href="{{ route('products.create') }}">Add Product</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Type</th>
        <th>Category</th>
        <th>Price</th>
        <th>Year</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>

    @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->release_year }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}"
                    method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>     
            </td>
        </tr>
    @endforeach
</table>