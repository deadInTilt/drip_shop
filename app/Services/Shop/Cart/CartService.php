<?php

namespace App\Services\Shop\Cart;

use App\Exceptions\Shop\Cart\CartItemOperationException;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\Logger\LoggerInterface;

class CartService
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        try {
            $cartItems = CartItem::with('product')
                ->where('user_id', auth()->id())
                ->get();

            return $cartItems;
        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось получить корзину', 0, $e);
        }

    }
    public function add($request)
    {
        $data = $request->validated();

        $productId = $data['product_id'];
        $product = Product::findOrFail($productId);
        $quantity = $data['quantity'] ?? 1;
        $userId = $request->user()->id;

        if ($product->quantity < $quantity) {
            throw new CartItemOperationException("Недостаточное количество товара '{$product->title}' в наличии");
        }

        try {

            $cartItem = CartItem::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось добавить товар в корзину', 0, $e);
        }

    }

    public function remove(int $id)
    {
        try {
            $cartItem = CartItem::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->first();

            if (!$cartItem) {
                $this->logger->warning('Попытка удалить несуществующий товар из корзины', [
                    'user_id' => auth()->id(),
                    'product_id' => $id,
                ]);
            }

            if ($cartItem->quantity > 1) {
                $cartItem->decrement('quantity');
            } else {
                $cartItem->delete();
            }
        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось удалить товар из крзины', 0, $e);
        }
    }
}
