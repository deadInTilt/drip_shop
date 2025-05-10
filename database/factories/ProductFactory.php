<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 1000),
            'color_id' => $this->faker->numberBetween(1, 7),
            'category_id' => $this->faker->numberBetween(1, 7),
            'brand_id' => $this->faker->numberBetween(1, 7),
            'preview_image' => $this->faker->imageUrl(),
        ];
    }
}
