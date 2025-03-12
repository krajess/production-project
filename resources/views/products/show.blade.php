<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $shop->name }}
        </h2>
    </x-slot>

    
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
    </div>
    @endif
</x-app-layout>