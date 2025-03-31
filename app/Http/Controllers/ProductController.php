<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vendorID)
    {
        $vendor = Vendor::find($vendorID);
        $productTypes = ProductType::all();
        return view('products.create', compact('vendor', 'productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $vendorID)
    {
        $vendor = Vendor::find($vendorID);
        $products = $request->input('products');

        foreach ($products as $productData) {
            $product = new Product();
            $product->vendor_id = $vendorID;
            $product->name = $productData['name'];
            $product->description = $productData['description'];
            $product->price = $productData['price'];
            $product->stock = $productData['stock'];
            $productType = ProductType::find($productData['product_type_id']);
            $product->product_types_name = $productType ? $productType->name : null;
            $product->save();
        }

        return redirect()->route('products.create', $vendorID);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor, Product $product)
    {
        return view('products.show', compact('vendor', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
