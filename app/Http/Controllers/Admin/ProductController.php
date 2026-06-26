<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'title'        => 'required|string|max:255',
            'keywords'     => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'detail'       => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'minstock'     => 'nullable|integer|min:0',
            'discount'     => 'nullable|integer|min:0|max:100',
            'status'       => 'sometimes|boolean',
            'image_url'    => 'nullable|string|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['image'] = $validated['image_url'] ?? null;

        Product::create($validated);

        return redirect()->route('admin.product.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'title'        => 'required|string|max:255',
            'keywords'     => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'detail'       => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'minstock'     => 'nullable|integer|min:0',
            'discount'     => 'nullable|integer|min:0|max:100',
            'status'       => 'sometimes|boolean',
            'image_url'    => 'nullable|string|max:2048',
        ]);

        $validated['image'] = $validated['image_url'] ?? $product->image;

        $product->update($validated);

        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
