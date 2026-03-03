@extends('layouts.app')

@section('content')

<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required
            aria-describedby="title-error"
            aria-invalid="@error('title') true @else false @enderror">
        @error('title')
            <p id="title-error" role="alert">
                {{ $message }}
            </p>
        @enderror         
    </div>

    <div>
        <label for="type">Type</label>
        <select name="type" id="type" required 
            aria-describedby="type-error"
            aria-invalid="@error('type') true @else false @enderror">
            
            <option value="movie">Movie</option>
            <option value="game">Game</option>
            <option value="vinyl">Vinyl</option>
            <option value="book">Book</option>
        </select>

                @error('type')
                    <p id="type-error" role="alert">
                        {{ $message }}
                    </p>
                @enderror
    </div>

   <div>
    <label for="category">Category</label>

    <select name="category" id="category" required
            aria-describedby="category-error"
            aria-invalid="@error('category') true @else false @enderror">
        <option value="">Select category</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category')
            <p id="category-error" role="alert">
                {{ $message }}
            </p>
    @enderror
</div>
    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" required
            aria-describedby="price-error"
            aria-invalid="@error('price') true @else false @enderror">
        @error('price')
            <p id="price-error" role="alert">
                {{ $message }}
            </p>
        @enderror       
    </div>

    <div>
        <label for="release_year">Release Year</label>
        <input type="number" name="release_year" id="release_year" required
            aria-describedby="release_year-error"
            aria-invalid="@error('release_year') true @else false @enderror">
        @error('release_year')
            <p id="release_year-error" role="alert">
                {{ $message }}
            </p>
        @enderror       
    </div>

    <div>
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" required
            aria-describedby="stock-error"
            aria-invalid="@error('stock') true @else false @enderror">
        @error('stock')
            <p id="stock-error" role="alert">
                {{ $message }}
            </p>
        @enderror       
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <button type="submit">Save</button>
</form>

<a href="{{ route('products.index') }}">Back</a>

@endsection