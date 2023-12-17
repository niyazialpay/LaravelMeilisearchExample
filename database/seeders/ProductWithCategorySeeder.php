<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductWithCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com'
        ]);
        $category1 = \App\Models\Categories::create([
            'category_name' => 'Giyim',
        ]);
        $category2 = \App\Models\Categories::create([
            'category_name' => 'Gömlek',
        ]);
        $attribute1 = \App\Models\Attributes::create([
            'attribute_name' => 'Renk',
        ]);
        $attribute2 = \App\Models\Attributes::create([
            'attribute_name' => 'Beden',
        ]);
        $product = \App\Models\Products::create([
            'product_name' => 'Test Ürünü',
            'product_description' => 'Product 1 Description',
            'user_id' => $user->id,
        ]);
        \App\Models\ProductCategories::create([
            'product_id' => $product->id,
            'category_id' => $category1->id,
        ]);
        \App\Models\ProductCategories::create([
            'product_id' => $product->id,
            'category_id' => $category2->id,
        ]);
        \App\Models\ProductAttributes::create([
            'product_id' => $product->id,
            'attribute_id' => $attribute1->id,
            'attribute_value' => 'Beyaz',
        ]);
        \App\Models\ProductAttributes::create([
            'product_id' => $product->id,
            'attribute_id' => $attribute2->id,
            'attribute_value' => 'L',
        ]);

        $product = \App\Models\Products::create([
            'product_name' => 'Other Test Product',
            'product_description' => '',
            'user_id' => $user->id,
        ]);
        \App\Models\ProductCategories::create([
            'product_id' => $product->id,
            'category_id' => $category1->id,
        ]);
        \App\Models\ProductCategories::create([
            'product_id' => $product->id,
            'category_id' => $category2->id,
        ]);
        \App\Models\ProductAttributes::create([
            'product_id' => $product->id,
            'attribute_id' => $attribute1->id,
            'attribute_value' => 'Siyah',
        ]);
        \App\Models\ProductAttributes::create([
            'product_id' => $product->id,
            'attribute_id' => $attribute2->id,
            'attribute_value' => 'S',
        ]);
    }
}
