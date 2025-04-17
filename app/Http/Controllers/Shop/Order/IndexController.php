<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $cartItems = CartItem::where('user_id', $request->user()->id)->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $user = $request->user();

        return view('shop.order.index', compact('cartItems', 'user', 'totalPrice'));
    }
}
