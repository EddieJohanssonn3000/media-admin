@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title"
               value="{{ old('title', $product->title) }}"
               required>

        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option value="movie" {{ $product->type == 'movie' ? 'selected' : '' }}>Movie</option>
            <option value="game" {{ $product->type == 'game' ? 'selected' : '' }}>Game</option>
            <option value="vinyl" {{ $product->type == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
            <option value="book" {{ $product->type == 'book' ? 'selected' : '' }}>Book</option>
        </select>

        @error('type')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category">Category</label>

        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price"
               value="{{ old('price', $product->price) }}"
               required>

        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="release_year">Release Year</label>
        <input type="number" name="release_year" id="release_year"
               value="{{ old('release_year', $product->release_year) }}"
               required>

        @error('release_year')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock"
               value="{{ old('stock', $product->stock) }}"
               required>

        @error('stock')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>

        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Update</button>
</form>

<a href="{{ route('products.index') }}">Back</a>

@endsection