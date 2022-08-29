<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Category()
    {

        return $this->belongsTo(ProductCategory::class);
       
    }
}
