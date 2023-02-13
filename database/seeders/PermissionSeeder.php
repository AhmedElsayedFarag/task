<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'users']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'categories']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'options']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'ads']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'reports']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'settings']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'notifications']);
        $permission->syncRoles(['super_admin']);

        $permission = Permission::create(['name' => 'activity_log']);
        $permission->syncRoles(['super_admin']);

    }
}
