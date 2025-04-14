<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeederElectronics extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorID = 1;

        $adjectives = ['Smart', 'High-Tech', 'Advanced', 'Innovative', 'Sleek', 'Powerful', 'Compact', 'Reliable', 'Cutting-Edge', 'Versatile'];
        $nouns = ['Smartphone', 'Laptop', 'Tablet', 'Headphones', 'Speaker', 'Camera', 'Monitor', 'Charger', 'Keyboard', 'Mouse'];
        $sentences = [
            'This product is designed to meet your needs.',
            'It offers exceptional performance and reliability.',
            'A perfect choice for both personal and professional use.',
            'Compact and lightweight, it is easy to carry around.',
            'Built with cutting-edge technology for superior functionality.',
            'Enhance your productivity with this innovative device.',
            'It is crafted with precision and attention to detail.',
            'Enjoy seamless connectivity and advanced features.',
            'This product is a must-have for tech enthusiasts.',
            'Experience unmatched quality and durability.',
            'Perfect for work, entertainment, and everything in between.',
            'It combines style and functionality in one package.',
            'Engineered to deliver outstanding performance.',
            'Stay ahead with this state-of-the-art device.',
            'It is designed for maximum convenience and usability.',
            'Enjoy a sleek and modern design that stands out.',
            'This product is built to last and perform under any condition.',
            'It is the ultimate solution for your tech needs.',
            'Experience the future of technology today.',
            'This device is perfect for enhancing your daily life.'
        ];

        for ($i = 0; $i < 50; $i++) {
            $description = implode(' ', array_slice($sentences, 0, rand(10, 15)));

            DB::table('products')->insert([
                'name' => $adjectives[array_rand($adjectives)] . ' ' . $nouns[array_rand($nouns)],
                'description' => $description,
                'price' => rand(500, 30000) / 100,
                'stock' => rand(5, 100),
                'images' => '[]',
                'product_types_name' => $i % 5 === 0 ? 'Accessories' : 'Electronics',
                'vendor_id' => $vendorID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}