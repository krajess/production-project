<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $shop->name }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-filter-menu>
        </x-nav-filter-menu>
        
        <div class="flex flex-wrap justify-start w-full">
            @if($shop->products->isEmpty())
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
                @foreach($shop->products as $product)
                    <div class="border rounded-lg p-4 flex flex-col bg-white shadow-md m-2" style="flex: 1 1 calc(33.33% - 2rem); max-width: calc(33.33% - 2rem); box-sizing: border-box; margin: 1rem;">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                        <div class="flex flex-col w-full">
                            <div class="flex justify-between items-center mb-1">
                                <p class="font-bold text-md">{{ $product->name }}</p>
                                <p class="bg-blue-200 text-black px-2 mr-2 rounded border border-black">{{ $product->name }}</p>
                            </div>
                            <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            @if ($product->stock == 0)
                                <p class="text-red-500 font-semibold mb-3">Out of Stock</p>

                                <div class="flex justify-between mt-4">
                                    <button class="bg-gray-300 text-white px-4 py-2 rounded" disabled>Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="window.location='{{ route('shops.products.show', ['shop' => $shop->id, 'product' => $product->id]) }}'">View</button>
                                </div>
                            @elseif ($product->stock < 10)
                                <p class="text-red-500 font-semibold mb-3">Low Stock</p>

                                <div class="flex justify-between mt-4">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="window.location='{{ route('shops.products.show', ['shop' => $shop->id, 'product' => $product->id]) }}'">View</button>
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex items-center">
                                        @csrf
                                            <div class="flex items-center border-none">
                                                <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.nextElementSibling.stepDown()">-</button>
                                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-10 text-center border-none">
                                                <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.previousElementSibling.stepUp()">+</button>
                                            </div>
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Add to Cart</button>
                                        </form>
                                </div>
                            @else
                                <p class="text-gray-700 mb-3">In Stock</p>

                                <div class="flex justify-between mt-4">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Purchase</button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="window.location='{{ route('shops.products.show', ['shop' => $shop->id, 'product' => $product->id]) }}'">View</button>
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex items-center">
                                        @csrf
                                            <div class="flex items-center border-none">
                                                <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.nextElementSibling.stepDown()">-</button>
                                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-10 text-center border-none">
                                                <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.previousElementSibling.stepUp()">+</button>
                                            </div>
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Add to Cart</button>
                                        </form>
                                </div>
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