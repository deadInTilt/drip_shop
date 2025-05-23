<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Repositories\Shop\CartRepository;
use App\Repositories\Shop\CatalogRepository;
use App\Services\Shop\Catalog\CatalogService;
use App\Services\Shop\ViewedProductService;
use Illuminate\Http\Request;

class IndexController extends AbstractCatalogController
{
    protected CatalogService $service;
    protected CartRepository $cartRepository;
    protected CatalogRepository $catalogRepository;
    protected ViewedProductService $viewedService;

    public function __construct(CatalogService $service,
                                CartRepository $cartRepository,
                                CatalogRepository $catalogRepository,
                                ViewedProductService $viewedService)
    {
        parent::__construct();
        $this->service = $service;
        $this->cartRepository = $cartRepository;
        $this->catalogRepository = $catalogRepository;
        $this->viewedService = $viewedService;
    }
    public function __invoke(Request $request)
    {
        $products = $this->service->getFilteredAndSortedProducts($request);

        $viewedProducts = $this->viewedService->getViewedProducts();
        $categories = $this->catalogRepository->getCategories();
        $brands = $this->catalogRepository->getBrands();
        $colors = $this->catalogRepository->getColors();
        $tags = $this->catalogRepository->getTags();
        $priceRange = $this->catalogRepository->getPriceRange();

        $cartItems = $this->cartRepository->getItemsForUser($request->user());
        $totalPrice = $this->cartRepository->getTotalPrice($cartItems);

        return view('shop.catalog.index', compact('products', 'categories', 'brands', 'colors', 'tags', 'priceRange', 'cartItems', 'totalPrice', 'viewedProducts'));
    }
}
