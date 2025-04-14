<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADD PRODUCTS') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6">
            <x-nav-vendor-owner>
            </x-nav-vendor-owner>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4 mr-4">
            <div class="w-full md:w-2/2 py-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('products.store', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="products-container">
                                <div class="product-item mb-4">
    
                                    <div class="mb-4">
                                        <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                                        <p class="text-gray-500 text-sm">Max. 5 pictures.</p>
                                        <input type="file" name="images[]" id="images" multiple class="form-input w-full mt-1" accept="image/*">
                                    </div>
    
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                    <p class="text-gray-500 text-sm">Max. 60 characters.</p>
                                    <input type="text" name="products[0][name]" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="60" required>
                                    
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;" >Description</label>
                                    <p class="text-gray-500 text-sm">Max. 1000 characters.</p>
                                    <textarea name="products[0][description]" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="1000"></textarea>
    
                                    <label for="product_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Product Type</label>
                                    <select name="products[0][product_type_id]" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach($productTypes as $productType)
                                            <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Price</label>
                                    <input type="number" name="products[0][price]" class="form-input rounded-md shadow-sm mt-1 block w-full" step="0.01" required>
                                    
                                    <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Stock</label>
                                    <input type="number" name="products[0][stock]" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                            </div>
                            <button type="submit" class="btn-dark">Add Products</button>
                            @if(session('success'))
                                <div class="text-green-500 alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger text-center">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>