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
                'user_id' => 2,
                'status' => 'accepted',
                'first_name' => 'John',
                'last_name' => 'Smith',
                'dob' => '1985-01-02',
                'email' => 'john.smith@example.com',
                'phone' => '07950000000',
                'address' => '52 Main Street',
                'city' => 'Leeds',
                'postcode' => 'LS5 3AE',
                'country' => 'United Kingdom',
                'vendor_name' => 'Johnny Electronics Ltd.',
                'vendor_description' => 'Johnny Electronics Ltd. example description.',
                'vendor_type' => 'Electronics',
                'vendor_experience' => 'Experience in online sales for over 5 years.',
                'terms_conditions' => true,
            ],
            [
                'user_id' => 3,
                'status' => 'accepted',
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'dob' => '1984-03-02',
                'email' => 'michael.johnson@example.com',
                'phone' => '07954000000',
                'address' => '34 Side Road',
                'city' => 'London',
                'postcode' => 'LN1 4AA',
                'country' => 'United Kingdom',
                'vendor_name' => 'MJ Gadgets Ltd.',
                'vendor_description' => 'MJ Gdagets Ltd. example description.',
                'vendor_type' => 'Accessories and Gadgets',
                'vendor_experience' => 'Less than 1 year of experience in online sales.',
                'terms_conditions' => true,
            ],
            [
                'user_id' => 4,
                'status' => 'new',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'dob' => '1990-04-15',
                'email' => 'jane.doe@example.com',
                'phone' => '07954000000',
                'address' => '28 Main Avenue',
                'city' => 'Manchester',
                'postcode' => 'M1 2AB',
                'country' => 'United Kingdom',
                'vendor_name' => 'Jane Fashion Ltd.',
                'vendor_description' => 'Jane Fashion Ltd. example description.',
                'vendor_type' => 'Fashion',
                'vendor_experience' => 'Experience in online sales for over 7 years.',
                'terms_conditions' => true,
            ]
        ]);
    }
}
