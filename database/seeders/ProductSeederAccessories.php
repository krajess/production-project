<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeederAccessories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorID = 2;

        $adjectives = ['Stylish', 'Elegant', 'Durable', 'Trendy', 'Compact', 'Lightweight', 'Versatile', 'Reliable', 'Premium', 'Unique'];
        $nouns = ['Bag', 'Wallet', 'Watch', 'Sunglasses', 'Belt', 'Scarf', 'Hat', 'Keychain', 'Notebook', 'Bottle'];
        $sentences = [
            'This accessory is designed to complement your style.',
            'Crafted with high-quality materials for durability.',
            'A perfect choice for both casual and formal occasions.',
            'Lightweight and compact, it is easy to carry anywhere.',
            'Combines functionality with a sleek design.',
            'Enhance your outfit with this trendy accessory.',
            'It is crafted with attention to detail and precision.',
            'Perfect for adding a touch of elegance to your look.',
            'This product is a must-have for fashion enthusiasts.',
            'Experience unmatched quality and craftsmanship.',
            'Ideal for everyday use or special occasions.',
            'It combines practicality and style in one package.',
            'Engineered to provide maximum comfort and usability.',
            'Stay ahead of the trends with this fashionable item.',
            'It is designed for convenience and versatility.',
            'Enjoy a modern and sophisticated design that stands out.',
            'This product is built to last and withstand daily use.',
            'It is the ultimate accessory for your lifestyle needs.',
            'Experience the perfect blend of style and functionality.',
            'This item is perfect for enhancing your daily routine.'
        ];

        for ($i = 0; $i < 30; $i++) {
            $description = implode(' ', array_slice($sentences, 0, rand(10, 15)));

            DB::table('products')->insert([
                'name' => $adjectives[array_rand($adjectives)] . ' ' . $nouns[array_rand($nouns)],
                'description' => $description,
                'price' => rand(100, 10000) / 100,
                'stock' => rand(5, 100),
                'images' => '[]',
                'product_types_name' => $i % 5 === 0 ? 'Home' : 'Accessories',
                'vendor_id' => $vendorID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}