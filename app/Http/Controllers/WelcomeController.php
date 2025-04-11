<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;

class WelcomeController extends Controller
{
    public function index()
    {
        $randomProducts = Product::inRandomOrder()->take(3)->get();
        $randomVendor = Vendor::inRandomOrder()->first();
        $totalProductsForVendor = Product::where('vendor_id', $randomVendor->id)->count();

        return view('welcome', compact('randomProducts', 'randomVendor', 'totalProductsForVendor'));
    }
}