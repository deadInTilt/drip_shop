<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\OrderRequest;
use App\Services\Shop\Order\OrderService;

class StoreController extends Controller
{
    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function __invoke(OrderRequest $request)
    {
        $order = $this->service->create($request);

        return redirect()->route('shop.payment.fake-gateway', [$order->id]);
    }
}
