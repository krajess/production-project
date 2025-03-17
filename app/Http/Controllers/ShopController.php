<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        if (!$shop->visible && !Gate::allows('view-shop', $shop)) {
            abort(403, 'Unauthorized access');
        }

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
