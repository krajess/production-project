<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'user',
                'last_name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('polska123'),
                'is_admin' => 0,
                'is_vendor_owner' => 0,
                'is_customer' => 1,
            ],
            [
                'first_name' => 'owner',
                'last_name' => 'owner',
                'email' => 'owner@example.com',
                'password' => Hash::make('polska123'),
                'is_admin' => 0,
                'is_vendor_owner' => 0,
                'is_customer' => 1,
            ],
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('polska123'),
                'is_admin' => 1,
                'is_vendor_owner' => 0,
                'is_customer' => 1,
            ],
        ]);
    }
}
