<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // حماية القائمة البيضاء لمنع Mass Assignment Vulnerability (تم إضافة حقل رابط الصورة الجديد)
    protected $fillable = [
        'category_id', 
        'user_id', 
        'title', 
        'keywords', 
        'description', 
        'detail', 
        'image', 
        'image_url', // الحقل الجديد المسموح بحفظه الآن
        'price', 
        'stock', 
        'minstock', 
        'discount', 
        'status'
    ];

    /**
     * علاقة المنتج بالقسم (كل منتج ينتمي لقسم معين)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * علاقة المنتج بالمستخدم أو الآدمن الذي أضافه
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}