<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'product_name',
        // 'brand_name',
        'image',
        // 'purchase_price',
        'selling_price',
        'stock',
        'description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}