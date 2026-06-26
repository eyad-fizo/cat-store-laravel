@extends('layouts.home')

@section('title', 'Amazon Pets - Premium Cat Store')

@section('content')
<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #eaeded; margin: 0; padding: 20px; display: flex; gap: 20px;">
    
    <aside style="width: 250px; background: white; padding: 20px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
        <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 15px; color: #111;">Department</h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 2.2;">
            <li><a href="#" style="color: #111; text-decoration: none; font-weight: bold;">🐾 Cat Supplies</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Cat Food</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Cat Toys</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Beds & Furniture</a></li>
        </ul>
        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">
        <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #111;">Customer Review</h3>
        <div style="color: #febd69; font-size: 14px; cursor: pointer;">
            ⭐⭐⭐⭐⭐ <span style="color: #565959;">& Up</span><br>
            ⭐⭐⭐⭐☆ <span style="color: #565959;">& Up</span>
        </div>
    </aside>

    <main style="flex: 1;">
        <div style="background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0)), url('https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=1200&auto=format&fit=crop') center/cover; height: 250px; border-radius: 4px; display: flex; align-items: flex-end; padding: 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <h1 style="color: white; font-size: 36px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); margin: 0;">Up to 40% off on Cat Essentials</h1>
        </div>

        <h2 style="font-size: 22px; font-weight: 700; margin-bottom: 20px; color: #111;">Results</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            @forelse($products as $product)
                <div style="background: white; border: 1px solid #e7e7e7; border-radius: 4px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; transition: box-shadow 0.2s; position: relative;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='none'">
                    
                    <div>
                        <div style="width: 100%; height: 220px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; background-color: #f7f7f7; border-radius: 4px; overflow: hidden;">
                            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1573865526739-10659fec78a5?q=80&w=300&auto=format&fit=crop' }}" alt="{{ $product->title }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>

                        <h3 style="font-size: 16px; font-weight: 500; line-height: 1.3; margin: 0 0 5px 0; color: #0f1111; height: 42px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{ $product->title }}
                        </h3>

                        <div style="margin-bottom: 8px; font-size: 13px;">
                            <span style="color: #de7921;">★★★★★</span>
                            <span style="color: #007185; margin-left: 5px; cursor: pointer;">8,421 ratings</span>
                        </div>

                        <p style="font-size: 13px; color: #565959; margin: 0 0 15px 0; height: 55px; overflow: hidden; line-height: 1.4;">
                            {{ $product->description ?? 'Premium quality product selected specially for your pet\'s comfort and health.' }}
                        </p>
                    </div>
                    
                    <div>
                        <div style="display: flex; align-items: baseline; margin-bottom: 12px;">
                            <span style="font-size: 12px; font-weight: 500; color: #0f1111; position: relative; top: -6px;">$</span>
                            <span style="font-size: 28px; font-weight: 500; color: #0f1111; line-height: 1;">{{ floor($product->price) }}</span>
                            <span style="font-size: 12px; font-weight: 500; color: #0f1111; position: relative; top: -6px;">{{ substr(strchr(number_format($product->price, 2), '.'), 1) }}</span>
                            
                            @if($product->stock < 5 && $product->stock > 0)
                                <span style="font-size: 12px; color: #b12704; font-weight: bold; margin-left: 10px;">Only {{ $product->stock }} left in stock - order soon.</span>
                            @endif
                        </div>

                        <div style="font-size: 12px; color: #565959; margin-bottom: 15px;">
                            🚀 Free Delivery <b>Tomorrow</b>
                        </div>

                        <button style="width: 100%; padding: 8px; background-color: #ffd814; border: 1px solid #fcd200; border-radius: 20px; cursor: pointer; font-size: 13px; color: #0f1111; font-weight: 500;" onmouseover="this.style.backgroundColor='#f7ca00'" onmouseout="this.style.backgroundColor='#ffd814'">
                            Add to Cart
                        </button>
                    </div>

                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; background: white; padding: 40px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 16px; color: #565959;">No products available right now.</p>
                    <a href="{{ route('admin.product.create') }}" style="color: #007185; text-decoration: none; font-weight: bold;">+ Add products via Admin Dashboard</a>
                </div>
            @endforelse
        </div>
    </main>

</div>
@endsection