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

class ProductSortingController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Product::query();

        switch ($request->input('sort')) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'title_asc':
                $query->orderBy('title');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();

        $categories = Category::all();

        $tags = Tag::all();

        $brands = Brand::query()
            ->select('id', 'title')
            ->has('products')
            ->get();

        $groups = Group::all();

        $colors = Color::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first();
        $minPrice = Product::orderBy('price', 'ASC')->first();

        return view('shop.catalog.index', compact('products', 'categories', 'tags', 'brands', 'groups', 'maxPrice', 'minPrice', 'colors'));
    }
}
