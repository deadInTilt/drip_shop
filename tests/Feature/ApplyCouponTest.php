<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplyCouponTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_apply_valid_coupon(): void
    {
        $user = User::factory()->create(['role_id' => 2]);

        $coupon = Coupon::factory()->create();

        $response = $this
                  ->actingAs($user)
                  ->post(route('shop.cart.applyCoupon'), ['coupon_name' => $coupon->name]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Промокод успешно применен!');
        $this->assertEquals(0, $coupon->fresh()->used);
        $this->assertEquals($coupon->name, session('coupon_name'));
    }

    public function test_applying_nonexistent_coupon_fails(): void
    {
        $user = User::factory()->create(['role_id' => 2]);

        $response = $this
            ->actingAs($user)
            ->post(route('shop.cart.applyCoupon'), ['coupon_name' => 'unknown']);

        $response->assertRedirect();
        $response->assertSessionHas('coupon_error', 'При применении купона возникла ошибка. Попробуйте позже.');
    }

    public function test_coupon_with_usage_limit_cannot_be_used_when_exceeded(): void
    {
        $user = User::factory()->create(['role_id' => 2]);
        $coupon = Coupon::factory()->create([
            'expires_at' => now()->subDays(10),
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('shop.cart.applyCoupon'), ['coupon_name' => $coupon->name]);

        $response->assertRedirect();
        $response->assertSessionHas('coupon_error', 'При применении купона возникла ошибка. Попробуйте позже.');
    }
}
