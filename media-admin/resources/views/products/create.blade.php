<h1>Add Product</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <p style="color:red;">{{ $message }}</p>
        @enderror         
    </div>

    <div>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option value="movie">Movie</option>
            <option value="game">Game</option>
            <option value="vinyl">Vinyl</option>
            <option value="book">Book</option>
        </select>
    </div>

    <div>
        <label for="category">Category</label>
        <input type="text" name="category" id="category">
        @error('category')
            <p style="color:red;">{{ $message }}</p>
        @enderror       
    </div>

    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price">
        @error('price')
            <p style="color:red;">{{ $message }}</p>
        @enderror       
    </div>

    <div>
        <label for="release_year">Release Year</label>
        <input type="number" name="release_year" id="release_year">
        @error('release_year')
            <p style="color:red;">{{ $message }}</p>
        @enderror       
    </div>

    <div>
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock">
        @error('stock')
            <p style="color:red;">{{ $message }}</p>
        @enderror       
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <button type="submit">Save</button>
</form>

<a href="{{ route('products.index') }}">Back</a>