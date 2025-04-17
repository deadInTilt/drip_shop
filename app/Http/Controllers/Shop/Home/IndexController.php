<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $cartItems = CartItem::where('user_id', $request->user()->id)->get();

        return view('shop.home.index', compact('cartItems'));
    }
}
