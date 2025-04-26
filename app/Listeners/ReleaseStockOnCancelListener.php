<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReleaseStockOnCancelListener
{
    /**
     * Handle the event.
     */
    public function handle(OrderCancelled $event): void
    {
        foreach ($event->order->items as $item) {
            $product = $item->product;
            $product->quantity += $item->quantity;
            $product->save();
        }
    }
}
