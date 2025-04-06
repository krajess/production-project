<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $vendor->name }}
        </h2>
    </x-slot>

    <div class="flex">
            <x-nav-filter-menu :vendor="$vendor">
            </x-nav-filter-menu>

        <div class="flex flex-wrap justify-start w-3/4">
            @if($products->isEmpty())
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
                @foreach($products as $product)
                    <div class="border rounded-lg p-2 flex flex-col bg-white shadow-m m-1" 
                        style="flex: 1 1 calc(25% - 0.5rem); max-width: calc(25% - 0.5rem); box-sizing: border-box; margin-top: 15px;">
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
                                <p class="font-bold" style="font-size: 20px;">{{ $product->name }}</p>
                                <p class="bg-blue-200 text-black px-2 mr-2 rounded border border-black" style="font-size: 11px;">{{ $product->product_types_name }}</p>
                            </div>
                            <p class="text-gray-700 mb-1 product-description">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            @if ($product->stock == 0)
                                <p class="text-red-500 font-semibold mb-3" style="font-size: 13px;">Out of stock</p>
                                    <button class="bg-gray-300 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;" disabled>Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @elseif ($product->stock < 10)
                                <p class="text-orange-300 font-semibold mb-3" style="font-size: 13px;">Low in stock - {{ $product->stock }} available</p>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @else
                                <p class="text-black-700 mb-3" style="font-size: 13px;">In stock - 10+ available</p>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @endif
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


<style>
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type=number] {
        -moz-appearance: textfield;
    }

    input[type=number]:focus {
    outline: none;
    box-shadow: none;
    }

    .product-description {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>