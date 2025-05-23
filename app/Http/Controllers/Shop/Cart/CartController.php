<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Exceptions\Shop\Cart\ApplyCouponException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Cart\CartRequest;
use App\Http\Requests\Shop\Cart\CouponRequest;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartService $service;
    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
            $cartItems = $this->service->getCart($request);
            $totalPrice = $this->service->getTotalPrice($cartItems);
            $discount = $this->service->getDiscount($totalPrice);

            return view('shop.cart.index', compact('cartItems', 'totalPrice', 'discount'));
    }

    public function addItemToCart(CartRequest $request)
    {
        $this->service->addItemToCart($request);

        return back()->with('success', 'Товар добавлен в корзину');
    }

    public function removeItemFromCart(int $productId)
    {
        $this->service->removeItemFromCart($productId);

        return back()->with('success', 'Товар удален из корзины');
    }

    public function applyCoupon(CouponRequest $request)
    {
        try {
            $this->service->applyCoupon($request);
            return back()->with('success', 'Промокод успешно применен!');
        } catch (ApplyCouponException $e) {
            return back()->with('coupon_error', 'При применении купона возникла ошибка. Попробуйте позже.');
        }
    }
}
