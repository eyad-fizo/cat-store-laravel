@extends('layouts.home')

@section('title', 'Admin - Categories List')

@section('content')
<div style="padding: 20px; font-family: Arial, sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Categories Management</h2>
        <a href="{{ route('admin.category.create') }}" style="padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Add New Category</a>
    </div>

    @if (session('success'))
        <div style="background:#d4edda; color:#155724; padding:10px; border-radius:4px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="12" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left; border: 1px solid #ddd;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><strong>{{ $category->title }}</strong></td>
                <td>
                    <span style="padding: 3px 8px; border-radius: 3px; font-size: 12px; background-color: {{ $category->status ? '#d4edda' : '#f8d7da' }}; color: {{ $category->status ? '#155724' : '#721c24' }};">
                        {{ $category->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}" style="color: #ffc107; text-decoration: none; margin-right: 15px; font-weight: bold;">Edit</a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
