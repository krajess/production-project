<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class VendorOwnerController extends Controller
{
    public function index()
    {
        return view('vendor_owner.index');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor_owner.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $vendor->name = $request->input('name');
        $vendor->description = $request->input('description');
        $vendor->description2 = $request->input('description2');

        $vendor->save();

        return redirect()->route('vendor_owner.index');
    }

    public function connectStripeAcc(Request $request, $id)
{
    $vendor = Vendor::findOrFail($id);

    $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
    $account = $stripe->accounts->create([
        'type' => 'express',
    ]);

    $vendor->stripe_account_id = $account->id;
    $vendor->save();

    return redirect()->route('vendor_owner.edit', $id);
}
}
