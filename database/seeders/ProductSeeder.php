<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Certified Translation',
                'added_by' => 'admin',
                'user_id' => 1,
                'subscription' => '1 Page (Max 250 Words)',
                'category_id' => 1,
                'photos' => '["uploads/products/photos/JmbHUvftZf4R431AlZvAnfPePkuvAUtpIz0xBmpX.png"]',
                'thumbnail_img' => 'uploads/products/thumbnail/LWNtYHvggNQkDDIOuOAvMyTzfvDeQdWUtqU2ICXL.png',
                'video_provider' => 'youtube',
                'tags' => 'seo,bronze,seo-bronze',
                'description' => 'Officially certified for use; documents are translated precisely, word-for-word.',
                'unit_price' => 31.67,
                'purchase_price' => 0.00,
                'variant_product' => 0,
                'attributes' => '[]',
                'choice_options' => '[]',
                'colors' => '[]',
                'current_stock' => 9741,
                'unit' => 'Pc',
                'shipping_type' => 'flat_rate',
                'shipping_cost' => 0.00,
                'num_of_sale' => 196,
                'slug' => 'certified'
            ],
            [
                'id' => 2,
                'name' => 'Standard Professional Translation',
                'added_by' => 'admin',
                'user_id' => 1,
                'subscription' => '1 Page (Max 250 Words)',
                'category_id' => 1,
                'photos' => '["uploads/products/photos/jMrZGFbj6FL0oT7bLLnenLQhaNQKwuVAOheUeeTa.png"]',
                'thumbnail_img' => 'uploads/products/thumbnail/Y5Zt7CicfHGTVfiUuPnZbuLZTWe6LVAdFdfznL64.png',
                'video_provider' => 'youtube',
                'tags' => 'seo,silver,seo-silver',
                'description' => 'For business or personal needs, documents are translated with human context and cultural relevance.',
                'unit_price' => 0.13,
                'purchase_price' => 0.00,
                'variant_product' => 0,
                'attributes' => '[]',
                'choice_options' => '[]',
                'colors' => '[]',
                'current_stock' => 9786,
                'unit' => 'Pc',
                'shipping_type' => 'flat_rate',
                'shipping_cost' => 0.00,
                'num_of_sale' => 81,
                'slug' => 'standard'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
