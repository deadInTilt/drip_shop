<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

        return view('shop.catalog.index', compact('products', 'categories', 'tags'));
    }
}
