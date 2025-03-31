<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

    public function show($id)
    {
        $vendor = Vendor::with('products')->findOrFail($id);

        if (!$vendor->visible && !Gate::allows('view-vendor', $vendor)) {
            abort(403, 'Unauthorized access');
        }

        return view('vendors.show', compact('vendor'));
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
}
