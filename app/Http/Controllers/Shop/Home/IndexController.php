<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
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

        return view('shop.home.index', compact('cartItems', 'totalPrice'));
    }
}
