<?php

namespace App\Services\Shop\Cart;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function add(Product $product, int $quantity)
    {
        CartItem::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $product->id],
            ['quantity' => DB::raw('quantity +' . $quantity)]
        );
    }

    public function remove(Product $product, int $quantity)
    {
        $cartItem = CartItem::where('user_id', auth()->id)
                            ->where('product_id', $product->id)
                            ->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Товар не найден в корзине'], 404);
        }

        if ($cartItem->quantity > $quantity) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }
    }

    public function index()
    {
        $items = CartItem::with('product')->where('user_id', auth()->id())->get();

        return $items;
    }
}
