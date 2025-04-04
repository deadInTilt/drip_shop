<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Models\Group;
use App\Models\Product;

class ProductGroupColorController
{
    public function getProductGroupColor(Product $product): array
    {
        $groupId = $product['group_id'];

        $groupProducts = Product::where('group_id', $groupId)->with('color')->get();

        $colors = $groupProducts
            ->pluck('color')
            ->values();

        return $colors;
    }
}
