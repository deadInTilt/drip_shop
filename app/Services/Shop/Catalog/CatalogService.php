<?php

namespace App\Services\Shop\Catalog;

use App\Http\Filters\CatalogFilter;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogService
{

    public function getFilteredAndSortedProducts(Request $request)
    {
        $filter = new CatalogFilter($request->query());
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

        return $query->paginate(9);
    }
}
