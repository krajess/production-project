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
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin.password123'),
                'is_admin' => 1,
                'is_vendor_owner' => 0,
                'is_customer' => 1,
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'password' => Hash::make('john.password123'),
                'is_admin' => 0,
                'is_vendor_owner' => 1,
                'is_customer' => 1,
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => Hash::make('michael.password123'),
                'is_admin' => 0,
                'is_vendor_owner' => 1,
                'is_customer' => 1,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane.doe@example.com',
                'password' => Hash::make('jane.password123'),
                'is_admin' => 0,
                'is_vendor_owner' => 0,
                'is_customer' => 1,
            ],
        ]);
    }
}
