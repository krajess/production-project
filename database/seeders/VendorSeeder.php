<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            [
                'name' => 'Johnny Electronics Ltd.',
                'description' => 'Johnny Electronics Ltd. example description.',
                'owner_id' => 2,
                'email' => 'john.smith@example.com',
                'visible' => 1,
                'background_color' => '#ffffff',
                'text_color' => '#000000',
                'description_text_color' => '#000000',
                'button_text_color' => '#ffffff',
                'button_background_color' => '#000000',
                'stripe_account_id' => 'acct_1RDloL2ZUdNwZB1v',
            ],
            [
                'name' => 'MJ Gadgets Ltd.',
                'description' => 'MJ Gdagets Ltd. example description.',
                'owner_id' => 3,
                'email' => 'micahel.johnson@example.com',
                'visible' => 1,
                'background_color' => '#ffffff',
                'text_color' => '#000000',
                'description_text_color' => '#000000',
                'button_text_color' => '#ffffff',
                'button_background_color' => '#000000',
                'stripe_account_id' => 'acct_1RDm5FFQa5Lur0j1',
            ],
        ]);
    }
}