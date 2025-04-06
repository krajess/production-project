<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $cart = Auth::user()->cart;
    
        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
    
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
    
        $lineItems = [];
        foreach ($cart->products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $product->name,
                        'description' => $product->description,
                    ],
                    'unit_amount' => $product->price * 100
                ],
                'quantity' => $product->pivot->quantity,
            ];
        }
    
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?success=true',
            'cancel_url' => route('checkout.fail') . '?canceled=true',
        ]);

        $cart->products()->detach();
    
        return redirect($session->url);
    }
}