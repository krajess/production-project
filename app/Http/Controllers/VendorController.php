<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Stripe\StripeClient;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::where('visible', true)->get();
        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit(Vendor $vendor)
    {
        //
    }

    public function update(Request $request, Vendor $vendor)
    {
       //
    }

    public function destroy(Vendor $vendor)
    {
        //
    }

    public function connectStripeAcc($vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);

        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        $account = $stripe->accounts->create([
            'type' => 'express',
        ]);

        $vendor->stripe_account_id = $account->id;
        $vendor->save();

        $accountLink = $stripe->accountLinks->create([
            'account' => $account->id,
            'refresh_url' => route('vendor.stripe.link', $vendor->id),
            'return_url' => route('vendor.stripe.callback'),
            'type' => 'account_onboarding',
        ]);

        return redirect($accountLink->url);
    }

    public function handleStripeCallback(Request $request)
    {
        return redirect()->route('vendor_owner.index');
    }

    public function preview($id)
    {
        $vendor = Vendor::findOrFail($id);

        if (!$vendor->visible && !Gate::allows('view-vendor', $vendor)) {
            abort(403, 'Unauthorized access');
        }

        return view('vendor_owner.preview', compact('vendor'));
    }
}
