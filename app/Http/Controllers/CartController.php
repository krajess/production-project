<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);
    
        if ($cart->products()->exists() && $cart->products()->first()->shop_id !== $product->shop_id) {
            return redirect()->route('cart.index');
        }
    
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $request->input('quantity', 1)]
        ]);
    
        return redirect()->route('cart.index');
    }

    public function update(Request $request, Product $product)
    {
        $cart = Auth::user()->cart;

        if ($cart) {
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $request->input('quantity')]);
        }

        return redirect()->route('cart.index');
    }

    public function remove(Product $product)
    {
        $cart = Auth::user()->cart;

        if ($cart) {
            $cart->products()->detach($product->id);
        }

        return redirect()->route('cart.index');
    }
}