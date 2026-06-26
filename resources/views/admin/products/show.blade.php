@extends('layouts.home')

@section('title', 'Admin - Product Details')

@section('content')
<div style="max-width: 700px; margin: 20px auto; padding: 20px; font-family: Arial, sans-serif;">
    <h2>Product Deep Technical Details</h2>
    <a href="{{ route('admin.product.index') }}" style="color: #007bff; text-decoration: none; display: inline-block; margin-bottom: 20px;">← Back to Main Dashboard</a>

    <table border="1" cellpadding="12" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <tr style="background: #f8f9fa;">
            <th style="width: 30%;">Database Field</th>
            <th>Value Inside MySQL</th>
        </tr>
        <tr>
            <td><strong>Product ID</strong></td>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <td><strong>Category Code</strong></td>
            <td>{{ $product->category_id }}</td>
        </tr>
        <tr>
            <td><strong>Admin User ID (Creator)</strong></td>
            <td>{{ $product->user_id }}</td>
        </tr>
        <tr>
            <td><strong>Product Name</strong></td>
            <td>{{ $product->title }}</td>
        </tr>
        <tr>
            <td><strong>Current Price</strong></td>
            <td style="color: green; font-weight: bold;">${{ number_format($product->price, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Warehouse Stock</strong></td>
            <td>{{ $product->stock }} units available</td>
        </tr>
        <tr>
            <td><strong>Full Description</strong></td>
            <td>{{ $product->description ?? 'No long description provided for this product.' }}</td>
        </tr>
    </table>
</div>
@endsection