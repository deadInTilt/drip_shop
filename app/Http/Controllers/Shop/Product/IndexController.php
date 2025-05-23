<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\Shop\ViewedProductService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private const VIEWED_PRODUCTS_LIMIT = 4;

    public function index(Request $request, Product $product, ViewedProductService $viewedService)
    {
        $viewedService->addProductToViewed($product);

        $viewedProducts = $viewedService->getViewedProducts();

        $cartItems = CartItem::with('product')
            ->where('user_id', $request->user()->id)->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('shop.product.index', compact('product', 'cartItems', 'totalPrice', 'viewedProducts'));
    }
}
