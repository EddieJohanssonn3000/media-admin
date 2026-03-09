@extends('layouts.app')

@section('content')
    
<h2>Products</h2>

<form method="GET" action="{{ route('products.index') }}">
    <div>
        <label for="type">Filter by Type:</label>
        <select name="type" id="type">
            <option value="">All</option>
            <option value="movie" {{ request('type') == 'movie' ? 'selected' : '' }}>Movie</option>
            <option value="game" {{ request('type') == 'game' ? 'selected' : '' }}>Game</option>
            <option value="vinyl" {{ request('type') == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
            <option value="book" {{ request('type') == 'book' ? 'selected' : '' }}>Book</option>
        </select>
    </div>
    <div>
        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="">All</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="min_price">Min Price:</label>
        <input type="number" step="1"
            name="min_price"
            id="min_price"
            value="{{ request('min_price') }}">
    </div>
    <div>
        <label for="max_price">Max Price:</label>
        <input type="number" step="1"
            name="max_price"
            id="max_price"
            value="{{ request('max_price') }}">
    </div>
    <button type="submit">Filter</button>
</form>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Category</th>
            <th>Price</th>
            <th>Year</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ ucfirst($product->type) }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->release_year }}</td>
                <td>
                    {{ $product->stock }}
                    @if($product->stock == 0)
                        <span aria-label="Out of stock">⚠</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                        class="delete-btn"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>     
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection