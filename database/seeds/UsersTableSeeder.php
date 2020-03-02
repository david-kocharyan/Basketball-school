<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Role 1 is superAdmin and 2 is admin
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => "User Minasyan",
            'email' => "user@gmail.com",
            'password' => Hash::make('123456'),
        ]);
    }
}
