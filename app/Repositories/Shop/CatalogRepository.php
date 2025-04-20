<?php

namespace App\Repositories\Shop;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;

class CatalogRepository
{
    public function getProducts()
    {
        return Product::all();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getTags()
    {
        return Tag::all();
    }

    public function getBrands()
    {
        return Brand::select('id', 'title')->has('products')->get();
    }

    public function getGroups()
    {
        return Group::select('id', 'title')->has('products')->get();
    }

    public function getColors()
    {
        return Color::all();
    }

    public function getPriceRange(): array
    {
        $max = Product::orderByDesc('price')->first();
        $min = Product::orderBy('price')->first();
        return [
            'min' => $min,
            'max' => $max,
        ];
    }
}
