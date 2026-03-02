<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by category (relation)
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Filter by min price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filter by max price
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->get();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'type' => 'required|string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'release_year' => 'required|integer',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string'
        ]);

        Product::create([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'category_id' => $validated['category'],
            'price' => $validated['price'],
            'release_year' => $validated['release_year'],
            'stock' => $validated['stock'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:100',
        'type' => 'required|string',
        'category' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'release_year' => 'required|integer',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string'
    ]);

    $product->update([
        'title' => $validated['title'],
        'type' => $validated['type'],
        'category_id' => $validated['category'],
        'price' => $validated['price'],
        'release_year' => $validated['release_year'],
        'stock' => $validated['stock'],
        'description' => $validated['description'] ?? null,
    ]);

    return redirect()->route('products.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
