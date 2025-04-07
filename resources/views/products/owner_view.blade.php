<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $vendor->name }}
        </h2>
    </x-slot>
        
        <div class="flex flex-wrap justify-start w-full">
            @if($vendor->products->isEmpty())
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ __("No products available!") }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($vendor->products as $product)
                    <div class="border rounded-lg p-4 flex flex-col bg-white shadow-md m-2" style="flex: 1 1 calc(33.33% - 2rem); max-width: calc(33.33% - 2rem); box-sizing: border-box; margin: 1rem;">
                        <div class="relative" style="height: 200px; overflow: hidden;">
                            @if (!empty($product->images) && is_array($product->images))
                                <img id="mainImage-{{ $product->id }}" 
                                     src="{{ asset('storage/' . $product->images[0]) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-contain mb-4 rounded">
                            @else
                                <img id="mainImage-{{ $product->id }}" 
                                     src="{{ asset('placeholder.png') }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-contain mb-4 rounded">
                            @endif
                        </div>
                        
                        @if (!empty($product->images) && is_array($product->images))
                            <div class="flex mt-2 space-x-2">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" 
                                         alt="Thumbnail" 
                                         class="w-12 h-12 object-contain rounded cursor-pointer" 
                                         onclick="document.getElementById('mainImage-{{ $product->id }}').src='{{ asset('storage/' . $image) }}'">
                                @endforeach
                            </div>
                        @endif
                        <div class="flex flex-col w-full">
                            <div class="flex justify-between items-center mb-1">
                                <p class="font-bold text-md">{{ $product->name }}</p>
                                <p class="bg-blue-200 text-black px-2 mr-2 rounded border border-black">{{ $product->product_types_name }}</p>
                            </div>
                            <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-700 mb-3">Stock: {{ $product->stock }}</p>
                            <div class="flex justify-between items-center mt-auto">
                                <a href="{{ route('products.edit', ['vendor' => $vendor->id, 'product' => $product->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded w-full text-center" style="margin-bottom: 10px;">EDIT PRODUCT</a>
                            </div>
                            <form action="{{ route('products.destroy', ['vendor' => $vendor->id, 'product' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-center px-4 py-2 rounded w-full">DELETE PRODUCT</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 p-4">
                    {{ $products->appends(['query' => request('query')])->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>