<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {

        $tags = Tag::all();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();

        return view('admin.product.edit', compact('product','tags', 'categories', 'brands', 'colors'));
    }
}
