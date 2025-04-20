<?php

namespace App\Services\Shop\Order;

use App\Events\OrderCreated;
use App\Exceptions\Shop\Order\OrderCreateException;
use App\Repositories\Shop\CartRepository;
use App\Repositories\Shop\OrderRepository;
use App\Repositories\Shop\ProductRepository;
use App\Services\Logger\LoggerInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Decimal;

class OrderService
{
    protected LoggerInterface $logger;
    protected CartRepository $cartRepository;
    protected OrderRepository $orderRepository;

    public function __construct(LoggerInterface $logger,
                                OrderRepository $orderRepository,
                                CartRepository $cartRepository,
                                ProductRepository $productRepository)
    {
        $this->logger = $logger;
        $this->orderRepository = $orderRepository;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function create($request)
    {
        try {
            $data = $request->validated();
            $user = $request->user();

            $cartItems = $this->cartRepository->getItemsForUser($user);
            $totalPrice = $this->cartRepository->getTotalPrice($cartItems);

            if ($cartItems->isEmpty()) {
                throw new OrderCreateException('Корзина пуста', 0);
            }

            $orderData = array_merge($data, [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'total' => $totalPrice,
                'status' => 'new'
            ]);

            DB::beginTransaction();

            foreach ($cartItems as $item)
            {
                $this->productRepository->checkAndDecrementStock($item);
            }

            $order = $this->orderRepository->create($orderData);
            OrderCreated::dispatch($order);
            $this->orderRepository->addItemsToOrder($order, $cartItems);
            $this->cartRepository->clearCart($user);

            DB::commit();

            $this->logger->info('Создан заказ', [
                'user_id' => $user->id,
                'order_id' => $order->id,
                'total' => $totalPrice,
            ]);

            return $order;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new OrderCreateException('Ошибка при создании заказа', 0, $e);
        }
    }
}
