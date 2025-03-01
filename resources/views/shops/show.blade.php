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
                    <div class="border rounded-lg p-4 flex flex-col bg-white shadow-md m-2" style="flex: 1 1 calc(25% - 2rem); max-width: calc(25% - 2rem); box-sizing: border-box; margin: 1rem;">
                        <div class="flex items-center">
                            <div class="flex flex-col w-full">
                                <div class="flex justify-between items-center mb-1">
                                    <p class="font-bold text-md">{{ $product->name }}</p>
                                    <p class="bg-blue-200 text-black px-2 mr-2 rounded border border-black">{{ $product->name }}</p>
                                </div>
                                <p class="text-gray-700 mb-1">{{ $product->description }}</p>
                                <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>