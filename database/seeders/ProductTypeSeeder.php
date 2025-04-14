<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_types')->insert([
            [
                'id' => 1,
                'name' => 'Fashion',
            ],
            [
                'id' => 2,
                'name' => 'Accessories',
            ],
            [
                'id' => 3,
                'name' => 'Electronics',
            ],
            [
                'id' => 4,
                'name' => 'Home',
            ],
            [
                'id' => 5,
                'name' => 'Health',
            ],
            [
                'id' => 6,
                'name' => 'Beauty',
            ],
            [
                'id' => 7,
                'name' => 'Sports',
            ],
            [
                'id' => 8,
                'name' => 'Toys',
            ],
            [
                'id' => 9,
                'name' => 'Books',
            ],
            [
                'id' => 10,
                'name' => 'Automotive',
            ],
            [
                'id' => 11,
                'name' => 'Garden',
            ],
            [
                'id' => 12,
                'name' => 'Pet Supplies',
            ],
            [
                'id' => 13,
                'name' => 'Food & Drink',
            ],
            [
                'id' => 14,
                'name' => 'Office Supplies',
            ],
            [
                'id' => 15,
                'name' => 'Stationery',
            ],
            [
                'id' => 16,
                'name' => 'Crafts',
            ],
            [
                'id' => 17,
                'name' => 'Jewelry',
            ],
            [
                'id' => 18,
                'name' => 'Watches',
            ],
            [
                'id' => 19,
                'name' => 'Footwear',
            ],
            [
                'id' => 20,
                'name' => 'Bags',
            ],
        ]);
    }
}
