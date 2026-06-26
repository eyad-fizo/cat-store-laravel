<?php

namespace App\Http\Controllers;

use App\Models\Product; // تأكد من وجود هذا السطر في الأعلى تماماً
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($category_id = null)
    {
        // إذا ضغط المستخدم على قسم، نجلب منتجاته، وإلا نجلب كل المنتجات
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $products = Product::all();
        }

        // هنا نمرر المتغير للواجهة الأمامية
        return view('front.home', compact('products'));
    }
}
