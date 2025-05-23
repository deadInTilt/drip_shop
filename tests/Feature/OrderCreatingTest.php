<?php

namespace Tests\Feature;

use App\Exceptions\Shop\Order\OrderCreateException;
use App\Models\Address;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCreatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_order_from_cart()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create(['role_id' => 2]);

        Category::factory()->count(7)->create();
        Color::factory()->count(7)->create();
        Brand::factory()->count(7)->create();
        $product = Product::factory()->create(['quantity' => 10]);

        CartItem::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2
        ]);

        $address = Address::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post(route('shop.order.store'), [
            'address_id' => $address->id,
            'phone' => '+79529992022',
            'payment_method' => 'youpay',
            'delivery_method' => 'delivery',
        ]);

        $order = Order::where('user_id', $user->id)->first();

        $response->assertRedirect(route('shop.payment.fake-gateway', [$order->id]));

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'total' => $product->price * 2,
            'status' => 'new',
        ]);

        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $this->assertDatabaseMissing('cart_items', [
            'user_id' => $user->id,
        ]);
    }

    public function test_order_creation_fails_if_cart_is_empty()
    {
        $this->withoutExceptionHandling();

        $this->expectException(OrderCreateException::class);
        $this->expectExceptionMessage('Ошибка при создании заказа');

        $user = User::factory()->create();

        $address = Address::factory()->create(['user_id' => $user->id]);

        // корзина не заполнена -> создается заказ
        $this->actingAs($user)->post(route('shop.order.store'), [
            'address_id' => $address->id,
            'payment_method' => 'youpay',
            'delivery_method' => 'delivery',
            'phone' => '+79529992022',
        ]);
    }
}
