<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Repositories\Shop\CartRepository;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $cartItems = $this->service->getCart($request);
        $totalPrice = $this->service->getTotalPrice($cartItems);

        $user = $request->user();

        return view('shop.order.index', compact('cartItems', 'user', 'totalPrice'));
    }
}
