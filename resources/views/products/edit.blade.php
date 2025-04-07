<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update', ['vendor' => $vendor->id, 'product' => $product->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                            <input type="file" name="images[]" id="images" multiple class="form-input w-full mt-1" accept="image/*">
                        </div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                        <input type="text" name="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $product->name) }}">

                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;" >Description</label>
                        <textarea name="description" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('description', $product->description) }}</textarea>

                        <label for="product_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Product Type</label>
                        <select name="product_type_id" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                            @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}" {{ $productType->id == $product->productType->id ? 'selected' : '' }}>
                                    {{ $productType->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Price</label>
                        <input type="number" name="price" class="form-input rounded-md shadow-sm mt-1 block w-full" step="0.01" value="{{ old('price', $product->price) }}">

                        <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-200" style="margin-top: 10px;">Stock</label>
                        <input type="number" name="stock" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('stock', $product->stock) }}">

                        <button type="submit" class="bg-green-700 text-white text-center px-4 py-2 rounded w-full mt-2">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>