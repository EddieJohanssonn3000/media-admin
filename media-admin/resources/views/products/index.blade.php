<h1>Products</h1>

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
            </td>
        </tr>
    @endforeach
</table>