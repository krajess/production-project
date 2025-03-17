<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    
    <div class="flex">
        <x-nav-cart-menu>
        </x-nav-cart-menu>
        
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @if($cart && $cart->products->count())
                <div class="flex flex-col space-y-6">
                    @foreach($cart->products as $product)
                    <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full md:w-48 h-48 object-cover">
                        <div class="p-4 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">Quantity: {{ $product->pivot->quantity }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Price: &pound;{{ number_format($product->price, 2) }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Total: &pound;{{ number_format($product->price * $product->pivot->quantity, 2) }}</p>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                <form action="{{ route('cart.update', $product) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1" class="w-16 p-1 border rounded">
                                    <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                                </form>
                                <form action="{{ route('cart.remove', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>Your cart is empty.</p>
                @endif

            </div>
        </div>
    </div>
</div>
</x-app-layout>