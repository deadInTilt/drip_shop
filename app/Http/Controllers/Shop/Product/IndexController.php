<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Shop\Cart\CartService;
use App\Services\Shop\ViewedProductService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,
                             Product $product,
                             ViewedProductService $viewedService,
                             CartService $cartService)
    {
        $viewedService->addProductToViewed($product);
        $viewedProducts = $viewedService->getViewedProducts();

        $cartItems = $cartService->getCart($request);
        $totalPrice = $cartService->getTotalPrice($cartItems);

        return view('shop.product.index', compact('product', 'cartItems', 'totalPrice', 'viewedProducts'));
    }
}
