<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $brands = Brand::all();
        $groups = Group::all();
        $colors = Color::all();

        return view('admin.product.create', compact('tags', 'categories', 'brands', 'groups', 'colors'));
    }
}
