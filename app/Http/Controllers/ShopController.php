<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::where('visible', true)->get();
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $shop = Shop::with('products')->findOrFail($id);
        return view('shops.show', compact('shop'));
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(Request $request, Shop $shop)
    {
       //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
