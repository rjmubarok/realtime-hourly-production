<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'floor_id' => '1',
            'line_id' => '1',
            'user_type' => '1',
            'name' => 'Admin',
            'email' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
