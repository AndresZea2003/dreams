<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);

        $user = Role::create(['name' => 'User']);

        $permission = Permission::create(['name' => 'profile'])->syncRoles([$admin, $user]);
        $permission = Permission::create(['name' => 'profile.dates'])->syncRoles([$admin, $user]);
        $permission = Permission::create(['name' => 'users.show'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);
    }
}
