<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UsersTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            "name"=> "admin",
            "username"=> "admin",
            "email"=> "admin@admin.com",
            "password"=> Hash::make("123456"),
            "role"=> 'admin',
            "status"=> 'active',
            ],
            [
            "name"=> "agent",
            "username"=> "agent",
            "email"=> "agent@agent.com",
            "password"=> Hash::make("123456"),
            "role"=> 'agent',
            "status"=> 'active',
            ],
            [
            "name"=> "user",
            "username"=> "user",
            "email"=> "user@user.com",
            "password"=> Hash::make("123456"),
            "role"=> 'user',
            "status"=> 'active',
            ],
        ]
    );
    }
}
