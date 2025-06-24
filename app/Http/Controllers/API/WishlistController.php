<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\WishlistRequest;
use App\Http\Resources\WishlistResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        $wishlist = $user->wishlistItems()->with('product')->paginate(10);

        return WishlistResource::collection($wishlist)->response();
    }

    public function store(WishlistRequest $request): JsonResponse
    {
        $user = $request->user();
        $itemId = $request->validated()['product_id'];

        if ($user->wishlistItems()->where('product_id', $itemId)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Item already in wishlist'
            ], 409);
        }

        $user->wishlistItems()->attach($itemId);

        return response()->json([
            'success' => true,
            'message' => 'Item added to wishlist',
        ], 201);
    }

    public function destroy(WishlistRequest $request): JsonResponse
    {
        $user = $request->user();
        $itemId = $request->validated()['product_id'];


        if (!$user->wishlistItems()->where('product_id', $itemId)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in wishlist'
            ]);
        }

        $user->wishlistItems()->detach($itemId);

        return response()->json([
            'success' => true,
            'message' => 'Item deleted from wishlist',
        ], 204);
    }
}
