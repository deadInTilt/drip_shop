<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use AuthorizesRequests;

    public function callback(Request $request)
    {
        $order = Order::findOrFail($request->input('order_id'));
        $status = $request->input('status');

        if ($status == 'success') {
            $order->status = 'paid';
            $order->save();
        } else {
            $order->status = 'failed';
            $order->save();
        }
    }

    public function orderStatus($orderId)
    {
        $order = Order::findOrFail($orderId);

        $this->authorize('view', $order);

        return new OrderResource($order);
    }
}
