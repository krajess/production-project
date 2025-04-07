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
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $vendor = Vendor::with('products')->findOrFail($id);
    
        if (!$vendor->visible && !Gate::allows('view-vendor', $vendor)) {
            abort(403, 'Unauthorized access');
        }
    
        $query = $request->input('query');
        $products = $vendor->products()
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%');
            })
            ->paginate(20);
    
        return view('products.show_products', compact('vendor', 'products'));
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

        $request->validate([
            'products.*.images' => 'array|max:5',
        ]);

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

            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('products', 'public');
                    $images[] = $path;
                }
                $product->images = $images;
            } else {
                $product->images = [];
            }

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

        $request->validate([
            'images' => 'array|max:5',
        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->product_types_name = ProductType::find($request->input('product_type_id'))->name;

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $images[] = $path;
            }
            $product->images = $images;
        }

        $product->save();

        return redirect()->route('products.manage_products', $id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($vendorID, Product $product)
    {
        $vendor = $product->vendor;
    
        if (!Gate::allows('delete-product', $product)) {
            abort(403, 'Unauthorized action.');
        }

        $product->delete();
    
        return redirect()->route('products.manage_products', $vendorID);
    }

    public function manage_products($id)
    {
        $vendor = Vendor::with('products')->findOrFail($id);
    
        $products = $vendor->products()->paginate(20);
    
        return view('products.manage_products', compact('vendor', 'products'));
    }

    public function search(Request $request, Vendor $vendor)
    {
        $query = $request->input('query');
    
        $products = $vendor->products()
            ->where('name', 'LIKE', '%' . $query . '%')
            ->paginate(20);

    
        return view('products.show_products', compact('vendor', 'products'));
    }
}