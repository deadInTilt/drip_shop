<?php

namespace App\Services\Shop;

use App\Http\Filters\CatalogFilter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ViewedProductService
{
    private const VIEWED_PRODUCTS_LIMIT = 4;

    public function addProductToViewed(Product $product): void
    {
        $viewed = session()->get('viewed_products', []);

        if (!in_array($product->id, $viewed)) {
            array_unshift($viewed, $product->id);
        }

        $viewed = array_slice($viewed, 0, self::VIEWED_PRODUCTS_LIMIT);

        session()->put('viewed_products', $viewed);
    }

    public function getViewedProducts(): Collection
    {
        $viewedIds = session()->get('viewed_products', []);

        $viewedProducts = Product::whereIn('id', $viewedIds)->get();

        return $viewedProducts;
    }
}
