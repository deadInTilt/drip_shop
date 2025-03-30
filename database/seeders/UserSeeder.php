<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Category;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123'), 'role_id' => 1],
            ['name' => 'Customer', 'email' => 'customer@customer.com', 'password' => bcrypt('123'), 'role_id' => 2],
            ['name' => 'Manager', 'email' => 'manager@manager.com', 'password' => bcrypt('123'), 'role_id' => 3],
            ['name' => 'Courier', 'email' => 'courier@courier.com', 'password' => bcrypt('123'), 'role_id' => 4],
        ]);
    }
}
