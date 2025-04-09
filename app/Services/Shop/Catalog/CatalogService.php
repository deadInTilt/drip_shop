<?php

namespace App\Services\Shop\Catalog;

use App\Http\Filters\CatalogFilter;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class CatalogService
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

    public function getFilteredAndSortedProducts(Request $request, CatalogFilter $filter)
    {
        $query = Product::filter($filter);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');

            match ($sort) {
                'newest' => $query->orderByDesc('id'),
                'price_asc' => $query->orderBy('price'),
                'price_desc' => $query->orderByDesc('price'),
                'name_asc' => $query->orderBy('title'),
                'name_desc' => $query->orderByDesc('title'),
                default => null,
            };
        }

        return $query->paginate(3);
    }
}
