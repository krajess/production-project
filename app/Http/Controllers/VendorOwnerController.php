<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorOwnerController extends Controller
{
    public function index()
    {
        $vendor = Vendor::where('owner_id', Auth::id())->with('products')->firstOrFail();
    
        $totalSales = $vendor->products()
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->sum(DB::raw('order_product.quantity * products.price'));
    
        $totalProducts = $vendor->products()->count();
    
        $lowStockProducts = $vendor->products()
            ->whereBetween('stock', [1, 10])
            ->take(3)
            ->get();
    
        $outOfStockProducts = $vendor->products()->where('stock', '=', 0)->take(3)->get();
    
        $totalNumberOfSales = $vendor->products()
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->sum('order_product.quantity');
    
        $lastSale = $vendor->products()
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->orderBy('orders.created_at', 'desc')
            ->select('products.name as product_name', 'order_product.quantity', 'orders.created_at')
            ->first();
    
        return view('vendor_owner.index', compact(
            'vendor',
            'totalSales',
            'totalProducts',
            'lowStockProducts',
            'outOfStockProducts',
            'totalNumberOfSales',
            'lastSale'
        ));
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
}
