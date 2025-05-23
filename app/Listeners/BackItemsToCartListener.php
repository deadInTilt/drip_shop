<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Repositories\Shop\CartRepository;

class BackItemsToCartListener
{
    public function handle(OrderCancelled $event, CartRepository $cartRepository): void
    {
        $order = $event->order;

        foreach ($event->order->items as $item) {
            $cartRepository->addNewItem($order->user_id, $item->product_id, $item->quantity);
        }
    }
}
