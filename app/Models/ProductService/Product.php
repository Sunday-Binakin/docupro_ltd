<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
