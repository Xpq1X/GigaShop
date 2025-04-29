<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for product 1.',
            'price' => 19.99,
            'category' => 'Category 1',
            'image' => null,  // Add image URL/path if applicable
        ]);
    
        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for product 2.',
            'price' => 29.99,
            'category' => 'Category 2',
            'image' => null,  // Add image URL/path if applicable
        ]);
        Product::create([
            'name' => 'Product 3',
            'description' => 'Description for product 2.',
            'price' => 29.99,
            'category' => 'Category 2',
            'image' => null,  // Add image URL/path if applicable
        ]);
    }
}
