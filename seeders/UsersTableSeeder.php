<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'nindiabel',
            'email' => 'nindiabel@example.com',
            'password' => Hash::make('octavnindi'), 
        ]);
    }
}
