<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("rahasia");
        $user->api_token = str_random(100);
        $user->save();
    }
}
