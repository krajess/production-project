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

        $shop->visible = $request->has('visible') ? 1 : 0;

        $shop->name = $request->input('name');
        $shop->description = $request->input('description');

        $shop->save();

        return redirect()->route('shop_owner.index');
    }
}
