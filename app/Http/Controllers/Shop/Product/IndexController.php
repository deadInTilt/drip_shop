<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(Request $request, Product $product)
    {
        $cartItems = CartItem::where('user_id', $request->user()->id)->get();

        return view('shop.product.index', compact('product', 'cartItems'));
    }
}
