<?php

namespace App\Http\Controllers\Admin\User\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends Controller
{
 public function __invoke()
 {
     $products = Product::all();
     return ProductResource::collection($products);
 }
}
