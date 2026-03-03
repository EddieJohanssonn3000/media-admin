@extends('layouts.app')

@section('content')
    
<h2>Products</h2>

<form method="GET" action="{{ route('products.index') }}">
    <label for="type">Filter by Type:</label>

    <select name="type" id="type">
        <option value="">All</option>
        <option value="movie" {{ request('type') == 'movie' ? 'selected' : '' }}>Movie</option>
        <option value="game" {{ request('type') == 'game' ? 'selected' : '' }}>Game</option>
        <option value="vinyl" {{ request('type') == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
        <option value="book" {{ request('type') == 'book' ? 'selected' : '' }}>Book</option>
    </select>

    <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="">All</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label for="min_price">Min Price:</label>
    <input type="number" step="1"
           name="min_price"
           id="min_price"
           value="{{ request('min_price') }}">

    <label for="max_price">Max Price:</label>
    <input type="number" step="1"
           name="max_price"
           id="max_price"
           value="{{ request('max_price') }}">

    <button type="submit">Filter</button>
</form>


<table class="product-table">
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
            <td>{{ $product->category->name }}</td>
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

@endsection