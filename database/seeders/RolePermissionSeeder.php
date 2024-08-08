<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

            $teacherRole = Role::firstOrCreate([
                'name' => 'teacher'
            ]);
            $teacherPermissions = [
                'manage courses',

                // other singular action
                'subscribe course',
            ];
            $teacherRole->syncPermissions($teacherPermissions);

            $studentRole = Role::firstOrCreate([
                'name' => 'student'
            ]);
            $studentPermissions = [
                'subscribe course'
            ];
            $studentRole->syncPermissions($studentPermissions);

            $ownerRole = Role::firstOrCreate([
                'name' => 'owner'
            ]);

            $user = User::create([
                'name' => 'Owner Radm',
                'email' => 'admin@radm.com',
                'email_verified_at' => now(),
                'Occupation' => 'Owner',
                'Avatar' => 'images/default-avatar.png',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($ownerRole);
    }
}
