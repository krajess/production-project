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
                    
                        <input type="text" name="name" value="{{ old('name', $product->name) }}">
                        <textarea name="description">{{ old('description', $product->description) }}</textarea>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}">
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
                        <button type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>