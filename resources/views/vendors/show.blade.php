<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $vendor->name }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-filter-menu>
        </x-nav-filter-menu>
        
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
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                        <div class="flex flex-col w-full">
                            <div class="flex justify-between items-center mb-1">
                                <p class="font-bold text-md">{{ $product->name }}</p>
                                <p class="bg-blue-200 text-black px-2 mr-2 rounded border border-black">{{ $product->product_types_name }}</p>
                            </div>
                            <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            @if ($product->stock == 0)
                                <p class="text-red-500 font-semibold mb-3">Out of stock - 0 available</p>
                                    <button class="bg-gray-300 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;" disabled>Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @elseif ($product->stock < 10)
                                <p class="text-orange-300 font-semibold mb-3">Low in stock - {{ $product->stock }} available</p>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @else
                                <p class="text-black-700 mb-3">In stock - 10+ vailable</p>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full" style="margin-bottom: 10px;">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded w-full" onclick="window.location='{{ route('vendors.products.show', ['vendor' => $vendor->id, 'product' => $product->id]) }}'">View</button>
                            @endif
                        </div>
                    </div>
                @endforeach
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
</style>