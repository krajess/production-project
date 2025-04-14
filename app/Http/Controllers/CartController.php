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
    
        if ($cart->products()->exists() && $cart->products()->first()->vendor_id !== $product->vendor_id) {
            return redirect()->route('cart.index')->with('error', 'You cannot add products from different vendors.');
        }
    
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
        $requestedQuantity = $request->input('quantity', 1);
    
        $currentQuantity = $existingProduct ? $existingProduct->pivot->quantity : 0;
        $newTotalQuantity = $currentQuantity + $requestedQuantity;
    
        if ($newTotalQuantity > $product->stock) {
            return redirect()->route('cart.index')->with('error', 'You cannot add more than ' . $product->stock . ' of this product.');
        }
    
        if ($existingProduct) {
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $newTotalQuantity]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => $requestedQuantity]);
        }
    
        return redirect()->route('cart.index')->with('success', 'Product successfully added to cart.');
    }

    public function update(Request $request, Product $product)
    {
        $quantity = $request->input('quantity');
    
        if ($quantity < 1 || $quantity > $product->stock) {
            return redirect()->back()->with('error', 'Quantity must be between 1 and ' . $product->stock);
        }
    
        $cart = Auth::user()->cart;
        $cart->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
    
        return redirect()->back()->with('success', 'Quantity updated successfully');
    }
    public function remove(Product $product)
    {
        $cart = Auth::user()->cart;

        if ($cart) {
            $cart->products()->detach($product->id);
        }

        return redirect()->route('cart.index');
    }

    public function buy_button(Request $request, Product $product)
    {
        $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);

        if ($cart->products()->exists() && $cart->products()->first()->vendor_id !== $product->vendor_id) {
            return redirect()->route('cart.index')->with('error', 'You cannot add products from different vendors.');
        }

        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
        $requestedQuantity = $request->input('quantity', 1);

        $currentQuantity = $existingProduct ? $existingProduct->pivot->quantity : 0;
        $newTotalQuantity = $currentQuantity + $requestedQuantity;

        if ($newTotalQuantity > $product->stock) {
            return redirect()->route('cart.index')->with('error', 'You cannot add more than ' . $product->stock . ' of this product.');
        }

        if ($existingProduct) {
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $newTotalQuantity]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => $requestedQuantity]);
        }

        return redirect()->route('cart.index')->with('success', 'Product successfully added to cart.');
    }
}