<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $items = Product::all();

        if ($users == null || $items == null) {
            $this->command->warn('Нет пользователей или товаров для создания');
            return;
        }

        foreach ($users as $user) {
            $randomProducts = $items->random(rand(1,5));
            foreach ($randomProducts as $product) {
                CartItem::updateOrCreate([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ],
                [
                    'quantity' => rand(1,3)
                ]);
            }
        }
        $this->command->info('Корзины заполнены');
    }
}
