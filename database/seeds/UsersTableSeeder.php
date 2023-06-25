<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $adminRole = Role::where('name','admin')->first();
        $advisorRole = Role::where('name','advisor')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ]);
        $advisor = User::create([
            'name' => 'Advisor User',
            'email' => 'advisor@email.com',
            'password' => Hash::make('advisor2023'),
        ]);
        $user = User::create([
            'name' => 'Student User',
            'email' => 'user@email.com',
            'password' => Hash::make('user2023'),
        ]);

        $admin->roles()->attach($adminRole);
        $advisor->roles()->attach($advisorRole);
        $user->roles()->attach($userRole);

    }
}
