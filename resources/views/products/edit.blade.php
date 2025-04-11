<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EDIT PRODUCT - ') }}
            {{ $product->name }}
        </h2>
    </x-slot>

    @if(session('success') || session('error'))
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update', ['vendor' => $vendor->id, 'product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Existing Images</label>
                            <div class="flex flex-wrap gap-4 mt-2">
                                @if(is_array($product->images) && count($product->images) > 0)
                                    @foreach($product->images as $image)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="w-14 h-14 object-cover rounded">
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-gray-500">No images uploaded for this product.</p>
                                @endif
                            </div>
                        </div>

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
                    <form action="{{ route('products.remove_images', ['vendor' => $vendor->id, 'product' => $product->id]) }}" method="POST" class="mt-4" onsubmit="return confirm('Are you sure you want to remove all images?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-700 text-white text-center px-4 py-2 rounded w-full">
                            Remove Images
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>