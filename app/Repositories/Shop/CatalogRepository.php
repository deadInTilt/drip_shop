<?php

namespace App\Repositories\Shop;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class CatalogRepository
{
    public function getCategories()
    {
        return Cache::remember('catalog:categories', now()->addMinutes(60), function () {
            return Category::all();
        });
    }

    public function getTags()
    {
        return Cache::remember('catalog:tags', now()->addMinutes(60), function () {
            return Tag::all();
        });
    }

    public function getBrands()
    {
        return Cache::remember('catalog:brands', now()->addMinutes(60), function () {
            return Brand::select('id', 'title')->has('products')->get();
        });
    }

    public function getGroups()
    {
        return Cache::remember('catalog:groups', now()->addMinutes(60), function () {
            return Group::select('id', 'title')->has('products')->get();
        });
    }

    public function getColors()
    {
        return Cache::remember('catalog:colors', now()->addMinutes(60), function () {
            return Color::all();
        });
    }

    public function getPriceRange(): array
    {
        return Cache::remember('catalog:prices', now()->addMinutes(60), function () {
            $max = Product::orderByDesc('price')->first();
            $min = Product::orderBy('price')->first();
            return [
                'min' => $min,
                'max' => $max,
            ];
        });
    }
}
