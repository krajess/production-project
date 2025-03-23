<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $shop->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($product->stock == 0)
                        <div class="flex flex-col items-center">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                            <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-700 mb-3">Stock: {{ $product->stock }}</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" disabled>OUT OF STOCK!</button>
                        </div>
                    @else
                        <div class="flex flex-col items-center">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                            <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                            <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-700 mb-3">Stock: {{ $product->stock }}</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Purchase</button>
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
        </div>
    </div>
</x-app-layout>