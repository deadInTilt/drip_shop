<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\WishlistRequest;
use App\Http\Resources\WishlistResource;
use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();
        $wishlist = WishlistItem::query()->with('product')
            ->where('user_id', $user->id)
            ->paginate(10);

        return WishlistResource::collection($wishlist)->response();
    }

    public function store(WishlistRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();
        $itemId = $request->validated()['product_id'];

        if (WishlistItem::where('product_id', $itemId)->where('user_id', $user->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Item already in wishlist'
            ], 409);
        } elseif (!Product::where('id', $itemId)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $user->wishlistItems()->attach($itemId);

        return response()->json([
            'success' => true,
            'message' => 'Item added to wishlist',
        ], 201);
    }

    public function destroy(WishlistRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();
        $itemId = $request->validated()['product_id'];

        $user->wishlistItems()->detach($itemId);

        if (!WishlistItem::where('product_id',$itemId)
            ->where('user_id', $user->id)
            ->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in wishlist'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item deleted from wishlist',
        ], 204);
    }
}
