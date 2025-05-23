<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'discount_percent' => $this->faker->numberBetween(0, 100),
            'discount_fixed' => null,
            'max_uses' => $this->faker->numberBetween(50, 100),
            'used' => 0,
            'expires_at' => now()->addDays(10),
        ];
    }
}
