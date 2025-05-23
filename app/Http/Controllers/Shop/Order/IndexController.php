<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Repositories\Shop\CartRepository;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function __invoke(Request $request)
    {
        $cartItems = $this->cartService->getCart($request);
        $totalPrice = $this->cartService->getTotalPrice($cartItems);
        $discount = $this->cartService->getDiscount($totalPrice);

        $addresses = $request->user()->addresses;

        $user = $request->user();

        return view('shop.order.index', compact('cartItems', 'user', 'totalPrice', 'addresses', 'discount'));
    }
}
