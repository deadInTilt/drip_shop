<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,
                             CartService $cartService)
    {
        $cartItems = $cartService->getCart($request);
        $totalPrice = $cartService->getTotalPrice($cartItems);
        $discount = $cartService->getDiscount($totalPrice);
        $addresses = $request->user()->addresses;
        $user = $request->user();

        return view('shop.order.index', compact('cartItems', 'user', 'totalPrice', 'addresses', 'discount'));
    }
}
