<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAYMENT SUCCESSFUL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">PURCHASE DETAILS</h3>
                    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                    <p><strong>Vendor:</strong> {{ $vendor->name }}</p>
                    <p><strong>Email:</strong> {{ $vendor->email }}</p>

                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-center items-center h-full">
                                            @if(is_array($product->images) && count($product->images) > 0)
                                                @foreach($product->images as $image)
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="w-14 h-14 object-cover rounded">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-gray-500">Not Available</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="border text-center px-4 py-2">{{ $product->name }}</td>
                                    <td class="border text-center px-4 py-2">{{ $product->pivot->quantity }}</td>
                                    <td class="border text-center px-4 py-2">£{{ number_format($product->price, 2) }}</td>
                                    <td class="border text-center px-4 py-2">£{{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="mt-4"><strong>Total Price:</strong> £{{ number_format($products->sum(fn($product) => $product->price * $product->pivot->quantity), 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>