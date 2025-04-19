<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Cart\CartRequest;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function index(CartRequest $request)
    {
        $cartItems = $this->service->getCart($request);
        $totalPrice = $this->service->getTotalPrice($cartItems);

        return view('shop.cart.index', compact('cartItems', 'totalPrice'));
    }

    public function addItemToCart(CartRequest $request)
    {
        $this->service->addItemToCart($request);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function removeItemFromCart(int $productId)
    {
        $this->service->removeItemFromCart($productId);

        return redirect()->back()->with('success', 'Товар удален из корзины');
    }
}
