<?php

namespace App\Http\Controllers\Shop\Payment;

use App\Http\Requests\Shop\FakeGateway\ProcessRequest;

class FakeGatewayController
{
    public function showForm($orderId)
    {
        return view('shop.gateway.index', compact('orderId'));
    }

    public function processPayment(ProcessRequest $request)
    {
        $data = $request->validated();
        $orderId = $data['order_id'];

        $status = isset($data['simulate_success']) ? 'success' : 'fail';

        return view('shop.gateway.auto-submit', compact('status', 'orderId'));
    }
}
