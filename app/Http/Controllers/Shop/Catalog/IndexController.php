<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        $tags = Tag::all();
        $brands = Brand::all();
        $groups = Group::all();
        $colors = Color::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first();
        $minPrice = Product::orderBy('price', 'ASC')->first();

//        $groups = new ProductGroupColorController($product);

        return view('shop.catalog.index', compact('products', 'categories', 'tags', 'brands', 'groups', 'maxPrice', 'minPrice', 'colors'));
    }
}
