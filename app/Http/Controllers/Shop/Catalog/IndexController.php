<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Http\Filters\CatalogFilter;
use App\Services\Logger\FileLogger;
use App\Services\Shop\Catalog\CatalogService;
use Illuminate\Http\Request;

class IndexController extends AbstractCatalogController
{
    protected CatalogService $catalog;
    public function __construct(CatalogService $catalog, FileLogger $logger)
    {
        parent::__construct($logger);
        $this->catalog = $catalog;
    }
    public function __invoke(Request $request)
    {
        $filter = new CatalogFilter($request->query());

        $products = $this->catalog->getFilteredAndSortedProducts($request, $filter);

        $categories = $this->catalog->getCategories();
        $brands = $this->catalog->getBrands();
        $colors = $this->catalog->getColors();
        $tags = $this->catalog->getTags();
        $priceRange = $this->catalog->getPriceRange();

        return view('shop.catalog.index', compact('products', 'categories', 'brands', 'colors', 'tags', 'priceRange'));
    }
}
