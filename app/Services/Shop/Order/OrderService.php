<?php

namespace App\Services\Shop\Order;

use App\Exceptions\Shop\Order\OrderCreateException;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Order;
use App\Services\Logger\LoggerInterface;
use Illuminate\Support\Facades\DB;

class OrderService
{
    protected LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function create($data)
    {
        $user = auth()->id();
        $main_address = Address::where('user_id', $user->id)
                                ->where('is_main', 1)
                                ->first();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        try {
            DB::beginTransaction();

            if ($cartItems->isEmpty()) {
                throw new OrderCreateException('Корзина пуста', 0);
            }

            $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
            $address = implode(' , ', $main_address->attributesToArray());

            $order = Order::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $address,
                'delivery_method' => $data['delivery_method'],
                'payment_method' => $data['payment_method'],
                'total' => $totalPrice,
                'status' => 'new'
            ]);

            foreach ($cartItems as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            CartItem::where('user_id', $user->id)->delete();

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

    public function index()
    {

    }
}
