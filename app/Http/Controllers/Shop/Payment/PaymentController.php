<?php

namespace App\Http\Controllers\Shop\Payment;

use App\Exceptions\Shop\Payment\PaymentException;
use App\Http\Requests\Shop\Payment\CallbackRequest;
use App\Models\Order;
use App\Repositories\Shop\CartRepository;
use App\Services\Shop\Order\OrderService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class   PaymentController
{
    protected $orderService;
    protected $cartRepository;

    use AuthorizesRequests;

    public function __construct(CartRepository $cartRepository,
                                OrderService $orderService)
    {
        $this->cartRepository = $cartRepository;
        $this->orderService = $orderService;
    }

    public function callback(CallbackRequest $request)
    {
        try {
            $data = $request->validated();
            $order = Order::findOrFail($data['order_id']);

            $this->authorize('update', $order);

            if ($data['status'] === 'success') {
                $this->orderService->paid($order);
            } else {
                $this->orderService->cancel($order);
            }

            return redirect()->route('shop.payment.status', [$order->id]);
        } catch (\Exception $e) {
            throw new PaymentException('Ошибка при обработке callback',0, $e);
        }
    }

    public function status($orderId)
    {
        $order = Order::findOrFail($orderId);

        $this->authorize('view', $order);

        $cartItems = $this->cartRepository->getItemsForUser($order->user);
        $totalPrice = $this->cartRepository->getTotalPrice($cartItems);

        return view('shop.order.payment-result', compact('order', 'cartItems', 'totalPrice'));
    }
}
