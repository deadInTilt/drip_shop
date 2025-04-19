<?php

namespace App\Repositories\Shop;

use App\Exceptions\Shop\Order\OrderCreateException;
use App\Models\CartItem;
use App\Models\Product;

class ProductRepository
{
    public function checkAndDecrementStock(CartItem $item): void
    {
        if ($item->product->quantity < $item->quantity) {
            throw new OrderCreateException("Товара '{$item->product->title}' недостаточно на складе");
        } else {
            $item->product->decrement('quantity', $item->quantity);
        }
    }

    public function find(int $id): Product
    {
        return Product::findOrFail($id);
    }
}
