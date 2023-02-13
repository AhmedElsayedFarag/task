<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'admin';
        $user->last_name = 'admin';
        $user->email = 'admin@admin.com';
        $user->phone = '01061756297';
        $user->password = '123456789';
        $user->save();
        $user->assignRole('super_admin');
    }
}
