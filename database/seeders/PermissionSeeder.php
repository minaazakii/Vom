<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //store Permissions
            ['create-store', 'store'],

            //Cart Item Permissions
            ['store-cart-item', 'cart-item']

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission[0]
                ],
                [
                    'category' => $permission[1]
                ]
            );
        }

        $storePermissions = Permission::where('category', 'store')->get();
        $cartItemPermissions = Permission::where('category', 'cart-item')->get();

        $merchantRole = Role::where('name', 'merchant')->first()->syncPermissions($storePermissions);
        $userRole = Role::where('name', 'user')->first()->syncPermissions($cartItemPermissions);
    }
}
