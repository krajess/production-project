<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->pivot->quantity,
            ];
        }
    
        $checkoutToken = Str::random(32);
        session()->put('checkout_token', $checkoutToken);

        $vendor = $cart->products->first()->vendor;
        
        if (!$vendor->stripe_account_id) {
            return redirect()->route('cart.index')->with('error', 'Vendor does not have a connected Stripe account.');
        }
    
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', ['token' => $checkoutToken]),
            'cancel_url' => route('checkout.fail') . '?canceled=true',
            'payment_intent_data' => [
                'transfer_data' => [
                    'destination' => $vendor->stripe_account_id,
                ],
            ],
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [ 
                'allowed_countries' => ['GB',],
            ],
        ]);
    
        session()->put('purchase_details', [
            'products' => $cart->products,
            'vendor' => $cart->products->first()->vendor,
        ]);
    
        return redirect($session->url);
    }


    public function success(Request $request)
    {
        $checkoutToken = session()->get('checkout_token');
        if (!$checkoutToken || $request->query('token') !== $checkoutToken) {
            return redirect()->route('cart.index')->with('error', 'Invalid or expired checkout session.');
        }
    
        $purchaseDetails = session()->get('purchase_details');
    
        if (!$purchaseDetails) {
            return redirect()->route('cart.index')->with('error', 'No purchase details found.');
        }
    
        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'total_price' => $purchaseDetails['products']->sum(fn($product) => $product->price * $product->pivot->quantity),
            'status' => 'completed',
        ]);
    
        foreach ($purchaseDetails['products'] as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
            ]);
    
            $product->decrement('stock', $product->pivot->quantity);
        }

        $cart = Auth::user()->cart;
        $cart->products()->detach();
    
        session()->forget('purchase_details');
        session()->forget('checkout_token');
    
        return view('checkout.success', [
            'order' => $order,
            'products' => $purchaseDetails['products'],
            'vendor' => $purchaseDetails['vendor'],
        ]);
    }
}