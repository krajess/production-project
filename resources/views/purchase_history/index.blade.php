<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="{{ route('purchase.history') }}" class="mb-6 flex items-center space-x-4">
                        <div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Search by Order ID" 
                                class="border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 dark:focus:ring-blue-600"
                            />
                        </div>
                        <div>
                            <select 
                                name="sort" 
                                class="border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 dark:focus:ring-blue-600"
                                style="width: 250px;"
                            >
                                <option value="">Sort by</option>
                                <option value="amount_asc" {{ request('sort') == 'amount_asc' ? 'selected' : '' }}>Total Amount: Low to High</option>
                                <option value="amount_desc" {{ request('sort') == 'amount_desc' ? 'selected' : '' }}>Total Amount: High to Low</option>
                                <option value="id_asc" {{ request('sort') == 'id_asc' ? 'selected' : '' }}>Order ID: Ascending</option>
                                <option value="id_desc" {{ request('sort') == 'id_desc' ? 'selected' : '' }}>Order ID: Descending</option>
                            </select>
                        </div>
                        <div>
                            <button 
                                type="submit" 
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition"
                            >
                                Apply
                            </button>
                        </div>
                    </form>
                    @forelse ($orders as $order)
                        <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Order ID: #{{ $order->id }}</h3>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="mb-2"><strong>Vendor:</strong> {{ $order->products->first()->vendor->name ?? 'N/A' }}</p>
                            <p class="mb-4"><strong>Total Price:</strong> <span class="text-green-600 dark:text-green-400">£{{ number_format($order->total_price, 2) }}</span></p>
                            <p class="mb-2"><strong>Status:</strong> 
                                <span class="
                                    @if($order->status == 'completed') text-green-600 dark:text-green-400 
                                    @elseif($order->status == 'pending') text-yellow-600 dark:text-yellow-400 
                                    @elseif($order->status == 'canceled') text-red-600 dark:text-red-400 
                                    @endif
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>

                            <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-600">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Product</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Quantity</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Price</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $product)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                            <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">{{ $product->name }}</td>
                                            <td class="border px-4 py-2 text-center text-gray-800 dark:text-gray-200">{{ $product->pivot->quantity }}</td>
                                            <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">£{{ number_format($product->price, 2) }}</td>
                                            <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">£{{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500 dark:text-gray-400 text-lg">You have no purchase history.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>