<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $vendor->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 flex flex-col items-center">
                        <div class="flex space-x-2 mb-4">
                        </div>
                        <img id="main-image" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded">
                    </div>

                    <div class="lg:w-1/2 lg:pl-6 flex flex-col items-center">
                        <p class="text-gray-700 mb-1 text-center">{{ $product->name }}</p>
                        <p class="text-green-500 font-semibold mb-3 text-center">&pound {{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-700 mb-3 text-center">Stock: {{ $product->stock }}</p>

                        @if ($product->stock == 0)
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" disabled>OUT OF STOCK!</button>
                        @else
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="flex flex-col items-center">
                                @csrf
                                <div class="flex items-center border-none mb-3">
                                    <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.nextElementSibling.stepDown()">-</button>
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-10 text-center border-none">
                                    <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1/2 rounded" onclick="this.previousElementSibling.stepUp()">+</button>
                                </div>
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Add to Cart</button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="mt-6 mb-6 p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Product Description</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>