<?php

namespace App\Services\Shop\Order;

use App\Exceptions\Shop\EmptyCartException;
use App\Http\Requests\Shop\Order\OrderRequest;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function create($data)
    {
       return DB::transaction(function () use ($data) {
           $user = auth()->user();
           $main_address = Address::where('user_id', $user->id)
                                    ->where('is_main', 1)
                                    ->first();
           $cartItems = CartItem::where('user_id', $user->id)->get();

           if ($cartItems->isEmpty()) {
               throw new EmptyCartException();
           }

           $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
           $address = implode(' , ', $main_address->attributesToArray());

           $order = Order::create([
               'user_id' => $user->id,
               'name' => $user->name,
               'email' => $user->email,
               'phone' => $user->phone,
               'address' => $address,
               'delivery_method' => $data['delivery_method'],
               'payment_method' => $data['payment_method'],
               'total' => $total,
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

           return $order;
       });
    }

    public function index()
    {

    }
}
