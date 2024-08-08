<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage courses',
            'manage categories',
            'manage teachers',
            'manage subscriptions',
            
            // other singular action
            'subscribe course'
            ];

            foreach ($permissions as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission
                ]);
            }

            
    }
}
