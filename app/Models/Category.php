<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'keywords',
        'description',
        'status',
    ];

    /**
     * علاقة القسم بالمنتجات (قسم واحد له منتجات كثيرة)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
