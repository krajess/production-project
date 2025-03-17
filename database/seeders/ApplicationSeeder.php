<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'user_id' => 1,
                'status' => 'new',
                'first_name' => 'user',
                'last_name' => 'user',
                'email' => 'user@example.com',
                'phone' => '123456789',
                'address' => 'user address',
                'city' => 'user city',
                'postcode' => '00-000',
                'country' => 'Poland',
                'business_name' => 'User Trading Ltd.',
                'business_description' => 'User Trading Ltd. description',
                'business_type' => 'Trading',
                'business_experience' => '5 years',
            ],
            [
                'user_id' => 2,
                'status' => 'new',
                'first_name' => 'owner',
                'last_name' => 'owner',
                'email' => 'owner@example.com',
                'phone' => '376456789',
                'address' => 'owner address',
                'city' => 'owner city',
                'postcode' => '01-220',
                'country' => 'United Kingdom',
                'business_name' => 'Owner Trading Ltd.',
                'business_description' => 'Owner Trading Ltd. description',
                'business_type' => 'Trading',
                'business_experience' => '2 years',
            ],
        ]);
    }
}
