@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product) }}" class="form-centered">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title"
            value="{{ old('title', $product->title) }}"         
            aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}">
        @include('partials.error', ['field' => 'title'])
    </div>

    <div>
        <label for="type">Type</label>
        <select name="type" id="type" 
            aria-invalid="{{ $errors->has('type') ? 'true' : 'false' }}">
            <option value="">Select type</option>
            <option value="movie" {{ old('type', $product->type) == 'movie' ? 'selected' : '' }}>Movie</option>
            <option value="game" {{ old('type', $product->type) == 'game' ? 'selected' : '' }}>Game</option>
            <option value="vinyl" {{ old('type', $product->type) == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
            <option value="book" {{ old('type', $product->type) == 'book' ? 'selected' : '' }}>Book</option>
        </select>
        @include('partials.error', ['field' => 'type'])
    </div>

    <div>
        <label for="category">Category</label>
        <select name="category" id="category" 
            aria-invalid="{{ $errors->has('category') ? 'true' : 'false' }}">
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @include('partials.error', ['field' => 'category'])
    </div>

    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price"
            value="{{ old('price', $product->price) }}"         
            aria-invalid="{{ $errors->has('price') ? 'true' : 'false' }}">
        @include('partials.error', ['field' => 'price'])
    </div>

    <div>
        <label for="release_year">Release Year</label>
        <input type="number" name="release_year" id="release_year"
            value="{{ old('release_year', $product->release_year) }}"         
            aria-invalid="{{ $errors->has('release_year') ? 'true' : 'false' }}">
        @include('partials.error', ['field' => 'release_year'])
    </div>

    <div>
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock"
            value="{{ old('stock', $product->stock) }}"
            aria-invalid="{{ $errors->has('stock') ? 'true' : 'false' }}">
        @include('partials.error', ['field' => 'stock'])
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $product->description) }}</textarea>
        @include('partials.error', ['field' => 'description'])
    </div>

    <button type="submit">Update</button>
</form>

<a href="{{ route('products.index') }}">Back</a>

@endsection