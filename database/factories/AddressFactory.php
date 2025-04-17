<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,4),
            'name' => $this->faker->name(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->buildingNumber(),
            'postcode' => $this->faker->postcode(),
        ];
    }
}
