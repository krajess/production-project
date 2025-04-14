<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('VENDOR DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6">
            <x-nav-vendor-owner>
            </x-nav-vendor-owner>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4">
            <div class="w-full md:w-2/2 py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white text-gray-900 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h1 class="text-center text-3xl font-extrabold mb-6">VENDOR STATISTICS</h1>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Sales:</p>
                                    <p class="text-2xl font-bold">£{{ number_format($totalSales, 2) }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Number of Sales:</p>
                                    <p class="text-2xl font-bold">{{ $totalNumberOfSales }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Last Sale:</p>
                                    @if($lastSale)
                                        <p class="text-xl font-bold">{{ $lastSale->product_name }}</p>
                                        <p>Quantity: {{ $lastSale->quantity }}</p>
                                        <p>Date: {{ $lastSale->created_at->format('d M Y, h:i A') }}</p>
                                    @else
                                        <p>No sales completed.</p>
                                    @endif
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Products:</p>
                                    <p class="text-2xl font-bold">{{ $totalProducts }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Low Stock Products:</p>
                                    <p class="text-2xl font-bold">
                                        @forelse ($lowStockProducts as $product)
                                        <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                            <h4 class="font-bold">{{ $product->name }}</h4>
                                            <p>Stock: {{ $product->stock }}</p>
                                        </div>
                                    @empty
                                        <p>No low stock products.</p>
                                    @endforelse
                                    </p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Out of Stock Products:</p>
                                    <p class="text-2xl font-bold">
                                        @forelse ($outOfStockProducts as $product)
                                        <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                            <h4 class="font-bold">{{ $product->name }}</h4>
                                            <p>Out of Stock</p>
                                        </div>
                                    @empty
                                        <p>No out of stock products.</p>
                                    @endforelse
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>