<?php

namespace App\Http\Controllers\Shop\Account;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Services\Shop\Cart\CartService;
use App\Services\Shop\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public $cartService;
    public $orderService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    public function __invoke(Request $request)
    {
        $cartItems = $this->cartService->getCart($request);
        $totalPrice = $this->cartService->getTotalPrice($cartItems);

        $orders = $this->orderService->getOrdersForUser($request->user());
        $addresses = $request->user()->addresses;

        return view('shop.account.index', compact('cartItems', 'totalPrice', 'orders', 'addresses'));
    }
}
