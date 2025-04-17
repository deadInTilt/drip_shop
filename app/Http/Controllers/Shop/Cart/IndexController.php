<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Cart\CartRequest;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cartItems = $this->service->index();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('shop.cart.index', compact('cartItems', 'totalPrice'));
    }

    public function add(CartRequest $request)
    {
        $data = $request->validated();

        $this->service->add($data['product_id'], $data['quantity']);
    }

    public function remove(CartRequest $request)
    {
        $data = $request->validated();

        $this->service->remove($data['product_id'], $data['quantity']);
    }
}
