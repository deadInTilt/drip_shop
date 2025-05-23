<?php

namespace App\Http\Controllers\Shop\Account;

use App\Http\Controllers\Controller;
use App\Services\Shop\Cart\CartService;
use App\Services\Shop\Order\OrderService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,
                             CartService $cartService,
                             OrderService $orderService)
    {
        $cartItems = $cartService->getCart($request);
        $totalPrice = $cartService->getTotalPrice($cartItems);

        $orders = $orderService->getOrdersForUser($request->user());
        $addresses = $request->user()->addresses;

        return view('shop.account.index', compact('cartItems', 'totalPrice', 'orders', 'addresses'));
    }
}
