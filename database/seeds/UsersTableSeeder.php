<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $sadminRole = Role::where('name', 'super admin')->first();
        $adminRole  = Role::where('name', 'admin')->first();
        $investorRole = Role::where('name', 'investor')->first();

        $sadmin = User::create([
            'name' => 'Super Admin',
            'username' => 'super_admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('superadmin')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin')
        ]);

        $invest = User::create([
            'name' => 'User Investor',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user123')
        ]);

        $sadmin->roles()->attach($sadminRole);
        $admin->roles()->attach($adminRole);
        $invest->roles()->attach($investorRole);
    }
}
