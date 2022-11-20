<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Muhammad Arbyan";
        $user->email = "arbyan@mail.com";
        $user->password = bcrypt('12345678'); 
        $user->save();
    }
}