<?php

namespace App\Models\ProductService;

use App\Models\ProductService\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
