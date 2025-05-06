<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-categories', 'create-categories', 'create-categories', 'edit-categories', 'delete-categories',
            'view-brands', 'create-brands', 'edit-brands', 'delete-brands',
            'view-tags', 'create-tags', 'edit-tags', 'delete-tags',
            'view-orders', 'create-orders', 'edit-orders', 'delete-orders',
            'view-products', 'create-products', 'edit-products', 'delete-products',
            'view-users', 'create-users', 'edit-users', 'delete-users',
            'view-roles', 'create-roles', 'edit-roles', 'delete-roles',
            'view-colors', 'create-colors', 'edit-colors', 'delete-colors',
            'view-groups', 'create-groups', 'edit-groups', 'delete-groups',
            'view-addresses', 'create-addresses', 'edit-addresses', 'delete-addresses'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['title' => $perm]);
        }

        $admin = Role::where('title', 'admin')->first();
        $admin->permissions()->sync(Permission::all()->pluck('id'));

        $manager = Role::where('title', 'manager')->first();
        $manager->permissions()->sync(Permission::whereIn('title', [
            'view-categories', 'create-categories', 'create-categories', 'edit-categories', 'delete-categories',
            'view-brands', 'create-brands', 'edit-brands', 'delete-brands',
            'view-tags', 'create-tags', 'edit-tags', 'delete-tags',
            'view-orders', 'create-orders', 'edit-orders', 'delete-orders',
            'view-products', 'create-products', 'edit-products', 'delete-products',
            'view-colors', 'create-colors', 'edit-colors', 'delete-colors',
            'view-groups', 'create-groups', 'edit-groups', 'delete-groups',
            'view-addresses', 'create-addresses', 'edit-addresses', 'delete-addresses'
        ])->pluck('id')->toArray());

        $courier = Role::where('title', 'courier')->first();
        $courier->permissions()->sync(Permission::where('title', 'view-orders')->pluck('id'));
    }
}
