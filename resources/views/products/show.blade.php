<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $vendor->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 flex flex-col items-center">
                        <div class="flex space-x-2 mb-4">
                        </div>
                        <div class="relative" style="height: 300px; overflow: hidden;">
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
                                         class="w-14 h-14 object-contain rounded cursor-pointer" 
                                         onclick="document.getElementById('mainImage-{{ $product->id }}').src='{{ asset('storage/' . $image) }}'">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="hidden lg:block border-l border-gray-300 m-4"></div>

                    <div class="lg:w-1/2 lg:pl-6 flex flex-col">
                        <p class="text-gray-700" style="margin-top: 10px; margin-bottom:10ox; font-size: 36px; font-weight: bold;">{{ $product->name }}</p>
                        <p class="text-gray-700" style="margin-top: 15px; font-size: 24px; font-weight: bold;">&pound {{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-700" style="margin-top: 15px; font-size: 18px; font-weight: bold;">Stock: {{ $product->stock }}</p>
                        <p class="text-gray-700" style="margin-top: 15px; font-size: 12px; font-weight: bold;">Type: {{ $product->product_types_name }}</p>

                        @if ($product->stock == 0)
                            <button class="bg-gray-300 text-white px-4 py-2 rounded" style="margin-top: 120px; margin-right: 20px;" disabled>OUT OF STOCK!</button>
                        @else
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="flex flex-col" style="margin-top: 20px;">
                                @csrf
                                <div class="flex space-x-2 border-2 border-gray-200 dark:border-gray-600 rounded w-40">
                                    <button type="button" class="p-1 rounded" onclick="this.nextElementSibling.stepDown()">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>   
                                    </button>
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-20 text-center border-none">
                                    <button type="button" class="p-1 rounded" onclick="this.previousElementSibling.stepUp()">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg> 
                                    </button>
                                </div>
                                @if ($product->product_types_name == 'Clothing')
                                    <div class="flex space-x-2 mt-5">
                                        @foreach (['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                            <label class="cursor-pointer">
                                                <input type="radio" name="size" value="{{ $size }}" class="hidden">
                                                <div class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-200">
                                                    {{ $size }}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                @elseif ($product->product_types_name == 'Footwear')
                                    <div class="flex space-x-2 mt-5">
                                        @foreach (['3UK', '4UK', '5UK', '6UK', '7UK', '8UK', '9UK', '10UK', '11UK', '12UK', '13UK'] as $size_shoes)
                                            <label class="cursor-pointer">
                                                <input type="radio" name="size" value="{{ $size_shoes }}" class="hidden">
                                                <div class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-200">
                                                    {{ $size_shoes }}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="margin-top: 60px; margin-right: 20px;">Add to Cart</button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="w-4/5 border-t border-gray-300 my-4 mx-auto"></div>

                <div class="mt-6 mb-6 p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Product Description</h3>
                    <p class="text-gray-700 dark:text-gray-300">{!! nl2br(e($product->description)) !!}</p>
                </div>
            </div>
            <div class="mt-6 mb-6 p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">More Products from {{ $vendor->name }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse ($relatedProducts as $relatedProduct)
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                            <a href="{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $relatedProduct->id]) }}">
                                <img src="{{ asset('storage/' . ($relatedProduct->images[0] ?? 'placeholder.png')) }}" 
                                     alt="{{ $relatedProduct->name }}" 
                                     class="w-full h-40 object-contain mb-4 rounded">
                                <h4 class="text-gray-800 dark:text-gray-200 font-semibold">{{ $relatedProduct->name }}</h4>
                                <p class="text-gray-700 mb-1 product-description">{{ $product->description }}</p>
                                <p class="text-green-500 font-semibold mb-3">£{{ number_format($relatedProduct->price, 2) }}</p>
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400">No products available from this vendor.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>

<style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
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