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
                <p>No products available for this shop.</p>
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
                            <div class="flex justify-between mt-4">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded">Purchase</button>
                                <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="window.location='{{ route('shops.products.show', ['shop' => $shop->id, 'product' => $product->id]) }}'">View</button>
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>