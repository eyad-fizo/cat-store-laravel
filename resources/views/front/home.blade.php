@extends('layouts.app')

@section('title', 'Amazon Pets - Premium Cat Store')

@section('content')
<div style="font-family: 'Segoe UI', Arial, sans-serif; background-color: #eaeded; margin: 0; padding: 20px; display: flex; gap: 20px;">
    
    <aside style="width: 260px; background: white; padding: 20px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
        <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 15px; color: #111;">Department</h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 2.2;">
            <li><a href="#" style="color: #111; text-decoration: none; font-weight: bold;">🐾 Cat Supplies</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Cat Food & Treats</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Cat Toys & Games</a></li>
            <li><a href="#" style="color: #565959; text-decoration: none; padding-left: 10px;">Beds & Furniture</a></li>
        </ul>
        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">
        <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #111;">Customer Reviews</h3>
        <div style="color: #febd69; font-size: 14px; cursor: pointer; line-height: 1.8;">
            <span style="color: #de7921;">★★★★☆</span> <span style="color: #565959;">& Up</span><br>
            <span style="color: #de7921;">★★★☆☆</span> <span style="color: #565959;">& Up</span>
        </div>
    </aside>

    <main style="flex: 1;">
        <div style="background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.1)), url('https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=1200&auto=format&fit=crop') center/cover; height: 230px; border-radius: 4px; display: flex; align-items: flex-end; padding: 20px; margin-bottom: 25px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <h1 style="color: white; font-size: 34px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); margin: 0;">🐾 Welcome to Meow Market 🐾</h1>
        </div>

        <h2 style="font-size: 20px; font-weight: 700; border-bottom: 2px solid #232f3e; padding-bottom: 10px; color: #232f3e; margin-bottom: 20px;">Available Cat Products</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px;">
            @forelse($products as $product)
                <div style="background: white; border: 1px solid #e7e7e7; border-radius: 4px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; transition: box-shadow 0.2s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.12)'" onmouseout="this.style.boxShadow='none'">
                    
                    <div>
                        <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; background-color: #f7f7f7; border-radius: 4px; overflow: hidden;">
                            <img src="{{ $product->image_url ?? $product->image ?? 'https://images.unsplash.com/photo-1573865526739-10659fec78a5?q=80&w=300&auto=format&fit=crop' }}" 
                                 alt="{{ $product->title }}" 
                                 style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>

                        <h3 style="font-size: 16px; font-weight: 500; line-height: 1.3; margin: 0 0 8px 0; color: #0f1111; height: 42px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{ $product->title }}
                        </h3>

                        <div style="margin-bottom: 8px; font-size: 13px;">
                            <span style="color: #de7921;">★★★★★</span>
                            <span style="color: #007185; margin-left: 5px; cursor: pointer;">4.8 (821)</span>
                        </div>

                        <p style="font-size: 13px; color: #565959; margin: 0 0 15px 0; height: 55px; overflow: hidden; line-height: 1.4;">
                            {{ $product->description ?? 'Premium quality product selected specially for your pet\'s comfort, health, and vitality.' }}
                        </p>
                    </div>
                    
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
                            <div>
                                <span style="font-size: 12px; font-weight: 500; color: #0f1111; position: relative; top: -6px;">$</span>
                                <span style="font-size: 26px; font-weight: 500; color: #0f1111; line-height: 1;">{{ floor($product->price) }}</span>
                                <span style="font-size: 12px; font-weight: 500; color: #0f1111; position: relative; top: -6px;">{{ substr(strchr(number_format($product->price, 2), '.'), 1) }}</span>
                            </div>
                            
                            <span style="font-size: 12px; color: {{ $product->stock > 0 ? '#007600' : '#b12704' }}; font-weight: bold;">
                                {{ $product->stock > 0 ? 'In Stock (' . $product->stock . ')' : 'Out of Stock' }}
                            </span>
                        </div>

                        <div style="font-size: 12px; color: #565959; margin-bottom: 15px;">
                            🚀 Free Delivery <b>Tomorrow</b>
                        </div>

                        <button style="width: 100%; padding: 10px; background-color: #ffd814; border: 1px solid #fcd200; border-radius: 100px; cursor: pointer; font-size: 13px; color: #111; font-weight: bold; transition: 0.2s;" onmouseover="this.style.backgroundColor='#f7ca00'" onmouseout="this.style.backgroundColor='#ffd814'">
                            Add to Cart
                        </button>
                    </div>

                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; background: white; padding: 50px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 18px; color: #565959; margin-bottom: 15px;">No cat products found in the database. Go to the Admin Panel to add some products!</p>
                    <a href="{{ route('admin.product.index') }}" style="color: #007185; text-decoration: none; font-weight: bold; font-size: 16px;">Go to Admin Dashboard →</a>
                </div>
            @endforelse
        </div>
    </main>

</div>
@endsection