<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        Color::insert([
            ['title' => 'Черный', 'color' => '000000'],
            ['title' => 'Белый', 'color' => 'ffffff'],
        ]);
    }
}
