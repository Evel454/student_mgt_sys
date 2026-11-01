<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage students',
            'manage courses',
            'manage registrations',
            'manage users',
            'view assigned courses',
            'view course students',
            'view available courses',
            'view own registrations',
            'register for course',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web'])
            ->syncPermissions(Permission::all());

        Role::firstOrCreate(['name' => 'lecturer', 'guard_name' => 'web'])
            ->syncPermissions(['view assigned courses', 'view course students']);

        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web'])
            ->syncPermissions(['view available courses', 'view own registrations', 'register for course']);

        // Q3c: assign each user the Spatie role matching their existing role column
        User::all()->each(function ($user) {
            if ($user->role) {
                $user->syncRoles($user->role);
            }
        });
    }
}