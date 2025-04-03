<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Group::insert([
            ['title' => 'Air Forces', 'description' => 'Group of Air Forces shoes'],
            ['title' => 'Campuses', 'description' => 'Group of Campuses shoes'],
            ['title' => 'Gazeles', 'description' => 'Group of Gazeles shoes'],
            ['title' => 'Air Max 90', 'description' => 'Group of Air Max 90 shoes'],
            ['title' => 'Dunks', 'description' => 'Group of Dunks shoes'],
        ]);
    }
}
