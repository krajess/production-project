<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Auth;

class VendorOwnerController extends Controller
{
    public function index()
    {
        return view('vendor_owner.index');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
    
        if (Auth::id() !== $vendor->owner_id) {
            abort(403, 'Unauthorized access.');
        }
    
        return view('vendor_owner.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        if (Auth::id() !== $vendor->owner_id) {
            abort(403, 'Unauthorized access.');
        }

        $vendor->name = $request->input('name');
        $vendor->description = $request->input('description');
        $vendor->background_color = $request->input('background_color', '#ffffff');
        $vendor->text_color = $request->input('text_color', '#000000');
        $vendor->description_text_color = $request->input('description_text_color', '#000000');
        $vendor->button_text_color = $request->input('button_text_color', '#ffffff');
        $vendor->button_background_color = $request->input('button_background_color', '#000000');

        $vendor->save();

        return redirect()->route('vendor_owner.index');
    }

    public function connectStripeAcc(Request $request, $id)
    {
    $vendor = Vendor::findOrFail($id);

    if (Auth::user()->id !== $vendor->owner_id) {
        abort(403, 'Unauthorized access.');
    }

    if (!empty($vendor->stripe_account_id)) {
        return redirect()->route('vendor_dashboard')->with('error', 'Your Stripe account is already connected.');
    }

    $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
    $account = $stripe->accounts->create([
        'type' => 'express',
    ]);

    $vendor->stripe_account_id = $account->id;
    $vendor->save();

    return redirect()->route('vendor_owner.edit', $id);
}
}
