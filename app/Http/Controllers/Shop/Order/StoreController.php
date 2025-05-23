<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\OrderRequest;
use App\Services\Shop\Order\OrderService;

class StoreController extends Controller
{
    public function __invoke(OrderRequest $request, OrderService $service)
    {
        $order = $service->create($request);

        return redirect()->route('shop.payment.fake-gateway', [$order->id]);
    }
}
