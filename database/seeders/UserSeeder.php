<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $user->name = 'Leo_User';
        $user->email = 'leo@user.com';
        $user->password = Hash::make('passwordUser');
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->name = 'Leo_Admin';
        $user->email = 'leo@admin.com';
        $user->password = Hash::make('passwordAdmin');
        $user->is_admin = '1';
        $user->save();
    }
}
