<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            ['title' => 'Nike Air Max 90',
            'description' => 'Классические кроссовки от Nike, выполненные из натуральной кожи, с культовой подошвой Air для максимального комфорта и амортизации. Подходят как для повседневной носки, так и для активного отдыха.',
            'preview_image' => 'images/Oy9nvv1r2qUdVJjlJLOd6sWV1p9YvRMMtN8q30nI.png',
            'quantity' => '1',
            'price' => '9999.00',
            'brand_id' => '1',
            'category_id' => '2',],

            ['title' => 'Nike Air Force 1 Low',
                'description' => 'Классические кроссовки от Nike, выполненные из натуральной кожи, с культовой подошвой Air для максимального комфорта и амортизации. Подходят как для повседневной носки, так и для активного отдыха.',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '1',
                'category_id' => '2',],
        ]);
    }
}
