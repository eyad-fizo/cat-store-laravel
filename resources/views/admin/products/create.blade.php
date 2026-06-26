@extends('layouts.home')

@section('title', 'Admin - Create New Product')

@section('content')
<div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif; background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
    <h2>Create New Product</h2>
    <p style="color: #666;">Fill out the form below to add a product to the database.</p>

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

    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Product Department / Category:</label>
            <select name="category_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: white; font-size: 14px;">
                <option value="">-- Select Department --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Product Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Price ($):</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Stock Quantity:</label>
            <input type="number" name="stock" value="{{ old('stock') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Status:</label>
            <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="1">Active (Visible on Store)</option>
                <option value="0">Inactive (Hidden)</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Product Image URL:</label>
            <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/photo-..." style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
            <small style="color: #666; display: block; margin-top: 5px;">ضع رابط الصورة من الإنترنت هنا لترسل تلقائياً للموقع</small>
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">Save to Database</button>
    </form>
</div>
@endsection
