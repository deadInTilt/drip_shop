<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
     public function getAll()
     {
         $products = Product::all();

         return ProductResource::collection($products);
     }
     public function getProductsInStock()
     {
         $products = Product::where('quantity', '>', 0)->get();

         return ProductResource::collection($products);
     }

     public function getProduct($id)
     {
         $product = Product::findOrFail($id);

         return new ProductResource($product);
     }

}
