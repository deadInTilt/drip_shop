<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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

    public function orderStatus(Request $request)
    {
        $order = Order::findOrFail($request->input('order_id'));

        return new OrderResource($order);
    }
}
