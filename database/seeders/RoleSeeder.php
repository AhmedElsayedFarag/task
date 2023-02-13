<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $role = \Spatie\Permission\Models\Role::create(['name' => 'super_admin']);
//        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $role = \Spatie\Permission\Models\Role::create(['name' => 'cms_user']);
    }
}
