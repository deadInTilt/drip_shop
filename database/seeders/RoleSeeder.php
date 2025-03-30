<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['title' => 'admin', 'description' => 'Администрирование системы'],
            ['title' => 'customer', 'description' => 'Пользователь сайта'],
            ['title' => 'manager', 'description' => 'Управление товарами, брендами, категориями, тегами'],
            ['title' => 'courier', 'description' => 'Курьер'],
        ]);
    }
}
