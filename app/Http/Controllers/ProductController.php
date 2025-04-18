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
use Illuminate\Support\Facades\Auth;

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
        $sort = $request->input('sort');
    
        $products = $vendor->products()
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%');
            })
            ->when($sort === 'price_low_to_high', function ($queryBuilder) {
                $queryBuilder->orderBy('price', 'asc');
            })
            ->when($sort === 'price_high_to_low', function ($queryBuilder) {
                $queryBuilder->orderBy('price', 'desc');
            })
            ->when($sort === 'newest', function ($queryBuilder) {
                $queryBuilder->orderBy('created_at', 'desc');
            })
            ->when($sort === 'oldest', function ($queryBuilder) {
                $queryBuilder->orderBy('created_at', 'asc');
            })
            ->when($sort === 'alph-a-z', function ($queryBuilder) {
                $queryBuilder->orderBy('name', 'asc');
            })
            ->when($sort === 'alph-z-a', function ($queryBuilder) {
                $queryBuilder->orderBy('name', 'desc');
            })

            ->paginate(20);
    
        return view('products.show_products', compact('vendor', 'products', 'sort'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($vendorID)
    {
        $vendor = Vendor::find($vendorID);

        if (Auth::id() !== $vendor->owner_id) {
            abort(403, 'Unauthorized access.');
        }

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

        return redirect()->route('products.create', $vendorID)
                         ->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor, Product $product)
    {
        if (!$vendor->visible && !Gate::allows('view-vendor', $vendor)) {
            abort(404, 'Vendor not found or not visible.');
        }

        if ($product->vendor_id !== $vendor->id) {
            abort(404, 'Product not found or not visible.');
        }
    
        $relatedProducts = $vendor->products()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
    
        return view('products.show', compact('vendor', 'product', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Product $product)
    {
        $vendor = Vendor::findOrFail($id);

        if (Auth::id() !== $vendor->owner_id) {
            abort(403, 'Unauthorized access.');
        }

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
    
        return redirect()->route('products.manage_products', $vendorID)->with('success', 'Product deleted successfully.');
    }

    public function manage_products($id)
    {
        $vendor = Vendor::with('products')->findOrFail($id);

        if (Auth::id() !== $vendor->owner_id) {
            abort(403, 'Unauthorized access.');
        }
    
        $products = $vendor->products()->paginate(20);
    
        return view('products.manage_products', compact('vendor', 'products'));
    }

    public function search(Request $request, Vendor $vendor)
    {
        $query = $request->input('query');
        $sort = $request->input('sort');
    
        $products = $vendor->products()
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%');
            })
            ->when($sort === 'price_low_to_high', function ($queryBuilder) {
                $queryBuilder->orderBy('price', 'asc');
            })
            ->when($sort === 'price_high_to_low', function ($queryBuilder) {
                $queryBuilder->orderBy('price', 'desc');
            })
            ->when($sort === 'newest', function ($queryBuilder) {
                $queryBuilder->orderBy('created_at', 'desc');
            })
            ->when($sort === 'oldest', function ($queryBuilder) {
                $queryBuilder->orderBy('created_at', 'asc');
            })
            ->when($sort === 'alph-a-z', function ($queryBuilder) {
                $queryBuilder->orderBy('name', 'asc');
            })
            ->when($sort === 'alph-z-a', function ($queryBuilder) {
                $queryBuilder->orderBy('name', 'desc');
            })
            ->paginate(20);
    
        return view('products.show_products', compact('vendor', 'products', 'sort'));
    }

    public function remove_images($vendorId, $productId)
    {
        $product = Product::findOrFail($productId);
    
        if (is_array($product->images)) {
            foreach ($product->images as $imagePath) {
                Storage::delete($imagePath);
            }
        }
    
        $product->images = [];
        $product->save();
    
        return redirect()->route('products.edit', ['vendor' => $vendorId, 'product' => $productId])
                         ->with('success', 'All images have been removed successfully.');
    }
}