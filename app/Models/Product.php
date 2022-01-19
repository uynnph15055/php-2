<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'slug', 'img', 'size', 'quantity', 'price', 'priceSale', 'cate_id', 'description', 'number_views'
    ];

    function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
