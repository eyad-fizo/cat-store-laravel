<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 1. توليد مسارات الـ Login والـ Register (يكتب مرة واحدة فقط في أعلى الملف خارج الحماية)
Auth::routes();

// 2. تحويل الزائر تلقائياً إلى صفحة المتجر الرئيسية
Route::get('/', function () {
    return redirect()->route('home');
});

// 3. مجموعة المسارات المحمية (لن تفتح إلا بعد تسجيل الدخول بنجاح)
Route::middleware(['auth'])->group(function () {

    // واجهة المتجر الأمامية لمنتجات القطط
    Route::get('/home/{category_id?}', [HomeController::class, 'index'])->name('home');

    // واجهة لوحة تحكم الإدارة لـ CRUD المنتجات والأقسام (محمية بصلاحية admin فقط)
    Route::prefix('/admin')->name('admin.')->middleware(['admin'])->group(function () {
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoryController::class);
    });

});
