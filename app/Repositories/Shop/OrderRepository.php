<?php

namespace App\Repositories\Shop;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function all()
    {
        return Order::all();
    }

    public function find($id)
    {
        return Order::find($id);
    }

    public function create($data): Order
    {
        return Order::create($data);
    }

    public function addItemsToOrder(Order $order, Collection $cartItems): void
    {
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
    }
}
