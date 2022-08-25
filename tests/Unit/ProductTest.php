<?php

namespace Tests\Unit;

use App\Models\ProductService\Product;
use App\Models\ProductService\ProductCategory;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_relationship(): void
    {
        $category = new ProductCategory([
            'category_name' => 'Category 1',
        ]);
        $category->save();

        $product = new Product([
            'product_category_id' => $category->id,
        ]);
        $product->save();

        $product->load('Category');

        $this->assertEquals('Category 1', $product->Category->category_name);
    }
}
