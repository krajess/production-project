<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopOwnerController extends Controller
{
    public function index()
    {
        return view('shop_owner.index');
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('shop_owner.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->update($request->all());
        return redirect()->route('shop_owner.index');
    }
}
