<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="products-container">
                            <div class="product-item mb-4">

                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Product 1</h2>

                                <div class="mb-4">
                                    <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                                    <input type="file" name="images[]" id="images" multiple class="form-input w-full mt-1" accept="image/*">
                                </div>

                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                <input type="text" name="products[0][name]" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;" >Description</label>
                                <textarea name="products[0][description]" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>

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
                        <button type="button" id="add-product" class="btn-dark mb-4">Add Another Product</button>
                        <button type="submit" class="btn-dark">Add Products</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-product').addEventListener('click', function() {
            const container = document.getElementById('products-container');
            const productCount = container.getElementsByClassName('product-item').length;
            const newProduct = document.createElement('div');
            newProduct.classList.add('product-item', 'mb-4');
            newProduct.innerHTML = `
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Product ${productCount + 1}</h2>
    
                <div class="mb-4">
                    <label for="images-${productCount}" class="block text-sm font-medium text-gray-700">Upload Images</label>
                    <input type="file" name="products[${productCount}][images][]" id="images-${productCount}" multiple class="form-input w-full mt-1" accept="image/*">
                </div>
    
                <label for="name-${productCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="products[${productCount}][name]" id="name-${productCount}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                
                <label for="description-${productCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Description</label>
                <textarea name="products[${productCount}][description]" id="description-${productCount}" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
    
                <label for="product_type-${productCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Product Type</label>
                <select name="products[${productCount}][product_type_id]" id="product_type-${productCount}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
                
                <label for="price-${productCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Price</label>
                <input type="number" name="products[${productCount}][price]" id="price-${productCount}" class="form-input rounded-md shadow-sm mt-1 block w-full" step="0.01" required>
                
                <label for="stock-${productCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Stock</label>
                <input type="number" name="products[${productCount}][stock]" id="stock-${productCount}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            `;
            container.appendChild(newProduct);
        });
    </script>
</x-app-layout>