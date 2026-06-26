@extends('layouts.home')

@section('title', 'Admin - Products List')

@section('content')
<div style="padding: 20px; font-family: Arial, sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Products Management Dashboard</h2>
        <a href="{{ route('admin.product.create') }}" style="padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Add New Product</a>
    </div>

    <table border="1" cellpadding="12" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left; border: 1px solid #ddd;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th>ID</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><strong>{{ $product->title }}</strong></td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <span style="padding: 3px 8px; border-radius: 3px; font-size: 12px; background-color: {{ $product->status ? '#d4edda' : '#f8d7da' }}; color: {{ $product->status ? '#155724' : '#721c24' }};">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.product.show', $product->id) }}" style="color: #007bff; text-decoration: none; margin-right: 15px; font-weight: bold;">Show</a>
                    
                    <a href="{{ route('admin.product.edit', $product->id) }}" style="color: #ffc107; text-decoration: none; margin-right: 15px; font-weight: bold;">Edit</a>
                    
                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #dc3545; background: none; border: none; padding: 0; cursor: pointer; font-weight: bold; font-family: Arial;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection