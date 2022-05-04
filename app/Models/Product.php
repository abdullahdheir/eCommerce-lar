<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // public $fillable = ['name', 'slug', 'short_description', 'description', 'regular_price', 'sale_price', 'SKU', 'stock_status', 'featured', 'quantity', 'image', 'images', 'category_id'];
}
