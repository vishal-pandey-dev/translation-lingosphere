<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Translation Services',
                'commision_rate' => 10.00,
                'featured' => true,
                'top' => true,
                'meta_title' => 'Professional Translation Services',
                'meta_description' => 'High-quality translation services in multiple languages'
            ],
            [
                'name' => 'Interpretation Services',
                'commision_rate' => 15.00,
                'featured' => true,
                'top' => true,
                'meta_title' => 'Professional Interpretation Services',
                'meta_description' => 'Expert interpretation services for all your needs'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
