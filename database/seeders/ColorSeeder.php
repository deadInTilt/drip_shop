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
            ['title' => 'Зеленый', 'color' => '008000'],
            ['title' => 'Синий', 'color' => '0000FF'],
            ['title' => 'Жёлтый', 'color' => 'FFFF00'],
            ['title' => 'Фиолетовый', 'color' => 'E6E6FA'],
            ['title' => 'Коричневый', 'color' => '964b00'],
            ['title' => 'Серый', 'color' => '808080'],
        ]);
    }
}
