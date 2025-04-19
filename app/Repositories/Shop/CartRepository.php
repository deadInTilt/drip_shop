<?php

namespace App\Repositories\Shop;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class CartRepository
{
    public function getItemsForUser(User $user): Collection
    {
        return CartItem::with('product')
                       ->where('user_id', $user->id)
                       ->get();
    }

    public function clearCart(User $user): void
    {
        CartItem::where('user_id', $user->id)->delete();
    }

    public function getItemFromCart(int $productId, int $userId)
    {
        return CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    }

    public function sumQuantity(CartItem $item, int $quantity): void
    {
        $item->quantity += $quantity;
        $item->save();
    }

    public function addNewItem(int $userId, int $productId, int $quantity): void
    {
        CartItem::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    public function decrementOrDeleteItemFromCart(CartItem $item): void
    {
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete();
        }
    }
}
