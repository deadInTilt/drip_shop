<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::insert([
            ['title' => 'Классика'],
            ['title' => 'Спорт'],
            ['title' => 'Баскетбол'],
            ['title' => 'Кэжуал'],
        ]);
    }
}
