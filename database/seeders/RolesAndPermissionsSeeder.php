<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'view_permissions']);
        Permission::create(['name' => 'view_roles']);
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'edit_permissions']);
        Permission::create(['name' => 'edit_roles']);
        Permission::create(['name' => 'delete_users']);
        Permission::create(['name' => 'delete_permissions']);
        Permission::create(['name' => 'delete_roles']);
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'create_permissions']);
        Permission::create(['name' => 'create_roles']);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Moderator'])->givePermissionTo([
            'view_users',
            'delete_users',
            'create_roles',
            'view_roles',
        ]);

        Role::create(['name' => 'Super Admin']);

    }
}
