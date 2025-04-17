<?php

namespace Database\Seeders;

use App\Models\Address;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Product;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::factory()->count(20)->create();
    }
}
