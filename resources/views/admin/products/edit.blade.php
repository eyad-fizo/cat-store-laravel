@extends('layouts.home')

@section('title', 'Admin - Edit Product')

@section('content')
<div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background: white;">
    <h2>Edit Product: {{ $product->title }}</h2>

    <a href="{{ route('admin.product.index') }}" style="color: #007bff; text-decoration: none; display: inline-block; margin-bottom: 20px;">← Back to Products List</a>

    @if ($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:4px; margin-bottom:15px;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Category:</label>
            <select name="category_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Title:</label>
            <input type="text" name="title" value="{{ $product->title }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Price ($):</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Stock Quantity:</label>
            <input type="number" name="stock" value="{{ $product->stock }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $product->description }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Status:</label>
            <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="1" {{ $product->status ? 'selected' : '' }}>Active (Visible on Store)</option>
                <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive (Hidden)</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Product Image URL:</label>
            <input type="text" name="image_url" value="{{ $product->image_url }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">Update Product</button>
    </form>
</div>
@endsection
