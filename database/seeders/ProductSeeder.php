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
                'category_id' => '2',
                'color_id' => '1',],

            ['title' => 'Nike Air Force 1 Low',
                'description' => 'Классические кроссовки от Nike, выполненные из натуральной кожи, с культовой подошвой Air для максимального комфорта и амортизации. Подходят как для повседневной носки, так и для активного отдыха.',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '1',
                'category_id' => '2',
                'color_id' => '1',],

            ['title' => 'Adidas Yeezy Boost 350 V2',
                'description' => 'Легендарные кроссовки, созданные в сотрудничестве с Канье Уэстом. Ультралегкие, с фирменной подошвой Boost, обеспечивающей мягкость и удобство при ходьбе. Идеальный выбор для стильного образа',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '2',
                'category_id' => '2',
                'color_id' => '1',],

            ['title' => 'New Balance 990v6',
                'description' => 'Премиальные кроссовки от New Balance, идеально сочетающие комфорт, стиль и долговечность. Верх выполнен из сочетания замши и сетки, а промежуточная подошва ENCAP обеспечивает превосходную амортизацию.',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '3',
                'category_id' => '2',
                'color_id' => '2',],

            ['title' => 'Puma RS-X',
                'description' => 'Современные кроссовки с технологией Running System (RS) для комфорта и поддержки стопы. Яркий дизайн, массивная подошва и удобная посадка делают эту модель отличным выбором для города.',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '4',
                'category_id' => '2',
                'color_id' => '1',],

            ['title' => 'Reebok Club C 85',
                'description' => 'Легендарные кроссовки, вдохновленные теннисной классикой. Выполнены из премиальной кожи, обеспечивающей долговечность и комфорт. Универсальный стиль отлично подойдет к любому образу.',
                'preview_image' => 'images/qWI0RUHun07I3afo5wMeINYl28Ej8gLix5M5kHzX.jpg',
                'quantity' => '1',
                'price' => '9999.00',
                'brand_id' => '5',
                'category_id' => '2',
                'color_id' => '1',],
        ]);
    }
}
