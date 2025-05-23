<?php

namespace App\Services\Shop\Order;

use App\Events\OrderCancelled;
use App\Events\OrderCreated;
use App\Exceptions\Shop\Order\OrderCreateException;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use App\Repositories\Shop\CartRepository;
use App\Repositories\Shop\OrderRepository;
use App\Repositories\Shop\ProductRepository;
use App\Services\Logger\LoggerInterface;
use Illuminate\Support\Facades\DB;

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
            $address = $request->user()->addresses->where('id', $data['address_id'])->first()->getFullAddressAttribute();
            unset($data['address_id']);

            $cartItems = $this->cartRepository->getItemsForUser($user);
            $totalPrice = $this->cartRepository->getTotalPrice($cartItems);

            if ($cartItems->isEmpty()) {
                throw new OrderCreateException('Корзина пуста', 0);
            }

            $orderData = array_merge($data, [
                'user_id' => $user->id,
                'address' => $address,
                'name' => $user->name,
                'email' => $user->email,
                'total' => $totalPrice,
                'status' => 'new'
            ]);

            DB::beginTransaction();

            foreach ($cartItems as $item) {
                $this->productRepository->checkAndDecrementStock($item);
            }

            if (session()->has('coupon_name')) {
                $coupon = Coupon::where('name', session('coupon_name'))->first();
                $coupon->increment('used');
            }

            $order = $this->orderRepository->create($orderData);
            $this->orderRepository->addItemsToOrder($order, $cartItems);
            $this->cartRepository->clearCart($user);

            DB::commit();

            $this->logger->info('Создан заказ', [
                'user_id' => $user->id,
                'order_id' => $order->id,
                'total' => $totalPrice,
            ]);

            session()->forget([
                'coupon_name',
                'coupon_discount_percent',
                'coupon_discount_fixed',
            ]);

            return $order;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new OrderCreateException('Ошибка при создании заказа', 0, $e);
        }
    }

    public function paid(Order $order): void
    {
        $order->status = 'paid';
        $order->save();

        OrderCreated::dispatch($order);
    }

    public function cancel(Order $order): void
    {
        $order->status = 'cancelled';
        $order->save();

        OrderCancelled::dispatch($order);
    }

    public function getOrdersForUser(User $user)
    {
        return Order::where('user_id', $user->id)->get();
    }
}
