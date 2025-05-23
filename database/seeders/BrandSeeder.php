<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::insert([
            ['title' => 'Nike', 'description' => 'Nike'],
            ['title' => 'Adidas', 'description' => 'Adidas'],
            ['title' => 'New Balance', 'description' => 'New Balance'],
            ['title' => 'Puma', 'description' => 'Puma'],
            ['title' => 'Reebok', 'description' => 'Reebok'],
            ['title' => 'Asics', 'description' => 'Asics'],

        ]);
    }
}
