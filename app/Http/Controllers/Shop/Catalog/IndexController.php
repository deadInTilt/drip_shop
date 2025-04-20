<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Repositories\Shop\CartRepository;
use App\Repositories\Shop\CatalogRepository;
use App\Services\Shop\Catalog\CatalogService;
use Illuminate\Http\Request;

class IndexController extends AbstractCatalogController
{
    protected CatalogService $service;
    public function __construct(CatalogService $service,
                                CartRepository $cartRepository,
                                CatalogRepository $catalogRepository)
    {
        parent::__construct();
        $this->service = $service;
        $this->cartRepository = $cartRepository;
        $this->catalogRepository = $catalogRepository;
    }
    public function __invoke(Request $request)
    {
        $products = $this->service->getFilteredAndSortedProducts($request);

        $categories = $this->catalogRepository->getCategories();
        $brands = $this->catalogRepository->getBrands();
        $colors = $this->catalogRepository->getColors();
        $tags = $this->catalogRepository->getTags();
        $priceRange = $this->catalogRepository->getPriceRange();

        $cartItems = $this->cartRepository->getItemsForUser($request->user());
        $totalPrice = $this->cartRepository->getTotalPrice($cartItems);

        return view('shop.catalog.index', compact('products', 'categories', 'brands', 'colors', 'tags', 'priceRange', 'cartItems', 'totalPrice'));
    }
}
