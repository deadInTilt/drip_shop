<?php

namespace App\Services\Shop\Cart;

use App\Exceptions\Shop\Cart\CartItemOperationException;
use App\Http\Requests\Shop\Cart\CartRequest;
use App\Models\CartItem;
use App\Models\Product;
use App\Repositories\Shop\CartRepository;
use App\Repositories\Shop\ProductRepository;
use App\Services\Logger\LoggerInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected LoggerInterface $logger;
    protected ProductRepository $productRepository;
    protected CartRepository $cartRepository;

    public function __construct(LoggerInterface $logger,
                                ProductRepository $productRepository,
                                CartRepository $cartRepository,)
    {
        $this->logger = $logger;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
    }

    public function getTotalPrice($cartItems): float
    {
        return $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
    }

    public function getCart(CartRequest $request): Collection
    {
        try {
            $cartItems = $this->cartRepository->getItemsForUser($request->user()->id);
            return $cartItems;
        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось получить корзину', 0, $e);
        }

    }
    public function addItemToCart(CartRequest $request)
    {
        try {
            $data = $request->validated();
            $productId = $data['product_id'];
            $product = $this->productRepository->find($productId);

            $quantity = $data['quantity'] ?? 1;
            $userId = $request->user()->id;

            if ($product->quantity < $quantity) {
                throw new CartItemOperationException("Недостаточное количество товара '{$product->title}' в наличии");
            }

            $item = $this->cartRepository->getItemFromCart($productId, $userId);

            if ($item) {
                $this->cartRepository->sumQuantity($item, $quantity);
            } else {
                $this->cartRepository->addNewItem($userId, $productId, $quantity);
            }

            $this->logger->info("Товар '{$product->id}' добавлен в корзину пользователем '{$userId}'");
        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось добавить товар в корзину', 0, $e);
        }

    }

    public function removeItemFromCart(int $productId)
    {
        try {
            $userId = auth()->user()->id;
            $item = $this->cartRepository->getItemFromCart($productId, $userId);

            if (!$item) {
                $this->logger->warning('Попытка удалить несуществующий товар из корзины', [
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                ]);
            }

            $this->cartRepository->decrementOrDeleteItemFromCart($item);

            $this->logger->info("Товар '{$productId}' удален из корзины пользователем '{$userId}'");

        } catch (\Throwable $e) {
            throw new CartItemOperationException('Не удалось удалить товар из корзины', 0, $e);
        }
    }
}
