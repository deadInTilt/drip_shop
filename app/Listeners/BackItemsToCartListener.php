<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Repositories\Shop\CartRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BackItemsToCartListener
{
    protected CartRepository $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function handle(OrderCancelled $event): void
    {
        $order = $event->order;

        foreach ($event->order->items as $item) {
            $this->cartRepository->addNewItem($order->user_id, $item->product_id, $item->quantity);
        }
    }
}
