<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = new User;
        $root->id = 0;
        $root->first_name = "Root";
        $root->last_name = "User";
        $root->email = "root@localhost";
        $root->email_verified_at = now();
        $root->user_type = User::USER_TYPE_ROOT;
        $root->password = Hash::make("superSecret!");
        $root->save();
    }
}
