<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    public function edit($id, Product $product)
    {
        $vendor = Vendor::findOrFail($id);
        $productTypes = ProductType::all();
    
        return view('products.edit', compact('vendor', 'product', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('products.owner_view', $id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function owner_view($id)
    {
        $vendor = Vendor::with('products')->findOrFail($id);
        return view('products.owner_view', compact('vendor'));
    }
}