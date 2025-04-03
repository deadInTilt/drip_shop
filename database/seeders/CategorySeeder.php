<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['title' => 'Кеды', 'preview_image' => 'images/categories/kedi.jpg'],
            ['title' => 'Кроссовки', 'preview_image' => 'images/categories/krossovki.jpg'],
            ['title' => 'Футболки', 'preview_image' => 'images/categories/shirt.jpg'],
            ['title' => 'Штаны', 'preview_image' => 'images/categories/pants.jpg'],
            ['title' => 'Шорты', 'preview_image' => 'images/categories/shorti.jpg'],
            ['title' => 'Носки', 'preview_image' => 'images/categories/socks.jpg'],
        ]);
    }
}
