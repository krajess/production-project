<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Your Cart') }} 
            @if ($cart && $cart->products)
                ({{ $cart->products->count() }} items)
            @endif
        </h2>
    </x-slot>
    
    @if(session('success') || session('error'))
        <div class="py-8">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex">
        <x-nav-cart-menu>
        </x-nav-cart-menu>
        
        <div class="py-8 w-2/3" style="margin-top: -15px; margin-right: 15px;">
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> 
                        @if($cart && $cart->products->count())
                        <div class="flex flex-col space-y-6">
                            @foreach($cart->products as $product)
                            <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row">
                                <div class="relative" style="height: 200px; width: 200px; overflow: hidden; margin: 10px;">
                                    @if (!empty($product->images) && is_array($product->images))
                                        <img id="mainImage-{{ $product->id }}" 
                                             src="{{ asset('storage/' . $product->images[0]) }}" 
                                             alt="{{ $product->name }}" 
                                             class="object-cover rounded"
                                             style="width: 100%; height: 100%;">
                                    @else
                                        <img id="mainImage-{{ $product->id }}" 
                                             src="{{ asset('placeholder.png') }}" 
                                             alt="{{ $product->name }}" 
                                             class="object-cover rounded"
                                             style="width: 100%; height: 100%;">
                                    @endif
                                </div>
                                <div class="p-4 flex flex-col justify-between">
                                    <div>
                                        <h1 style="font-size: 22px; font-weight: bold;">{{ $product->name }}</h1>
                                        <p class="text-green-800 text-lg font-bold mt-4 mb-2">&pound;{{ number_format($product->price, 2) }}</p>
                                        <p class="text-gray-600 text-sm dark:text-gray-400">Total: &pound;{{ number_format($product->price * $product->pivot->quantity, 2) }}</p>
                                        <p class="text-gray-600 text-sm dark:text-gray-400">Qty: {{ $product->pivot->quantity }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex space-x-2 border-2 border-gray-200 dark:border-gray-600 rounded w-40">
                                            <form action="{{ route('cart.update', $product) }}" method="POST" class="flex items-center" id="update-form-{{ $product->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="button" class="p-1 rounded" onclick="updateQuantity({{ $product->id }}, {{ $product->pivot->quantity + 1 }}, {{ $product->stock }})">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>                                              
                                                </button>
                                                <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1" max="{{ $product->stock }}" class="w-12 p-1 border-none text-center no-arrows" onblur="updateQuantity({{ $product->id }}, this.value, {{ $product->stock }})">
                                                <button type="button" class="p-1 rounded" onclick="updateQuantity({{ $product->id }}, {{ $product->pivot->quantity - 1 }}, {{ $product->stock }})">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>                                              
                                                </button>
                                            </form>
                                            <form action="{{ route('cart.remove', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1 rounded">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-center py-4">Your cart is empty.</p>
                        @endif
                    </div>
                    @if ($cart && $cart->products->isNotEmpty())
                    <form action="{{ route('checkout.create', ['vendor' => $product->vendor->id, 'product' => $product->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded m-2">Buy Now</button>
                    </form>
                @endif
                </div>
            </div>
        </div>
</x-app-layout>

<script>
    function updateQuantity(productId, quantity, maxStock) {
        if (quantity < 1 || quantity > maxStock) {
            alert(`There is only ${maxStock} item(s) in stock.`);
            return;
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/cart/update/${productId}`;

        const csrfField = document.createElement('input');
        csrfField.type = 'hidden';
        csrfField.name = '_token';
        csrfField.value = '{{ csrf_token() }}';
        form.appendChild(csrfField);

        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PATCH';
        form.appendChild(methodField);

        const quantityField = document.createElement('input');
        quantityField.type = 'hidden';
        quantityField.name = 'quantity';
        quantityField.value = quantity;
        form.appendChild(quantityField);

        document.body.appendChild(form);
        form.submit();
    }

    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('blur', function() {
            const productId = this.closest('form').id.split('-').pop();
            const maxStock = this.getAttribute('max');
            updateQuantity(productId, this.value, maxStock);
        });
    });
</script>

<style>
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>