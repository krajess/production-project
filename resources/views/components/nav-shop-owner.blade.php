@if (auth()->user()->is_business_owner)
    <div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <div class="text-center font-bold mb-4">
                <h2> {{ __("MANAGEMENT MENU") }} </h2>
            </div>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Stores</button>
                <div x-show="open" class="mt-2 space-y-2">
                    @if (auth()->user()->shops && auth()->user()->shops->count() > 0)
                        @foreach (auth()->user()->shops as $shop)
                            <a href="{{ route('shop_owner.edit', $shop->id) }}" class="btn-bright block text-center">{{ $shop->name }}</a>
                        @endforeach
                    @else
                        <p class="text-center text-gray-500">No shops available</p>
                    @endif
                </div>
            </div>
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Products</button>
                <div x-show="open" class="mt-2 space-y-2">
                    @if (auth()->user()->shops && auth()->user()->shops->count() > 0)
                        @foreach (auth()->user()->shops as $shop)
                            <a href="{{ route('products.create', $shop->id) }}" class="btn-bright block text-center">Add Product</a>
                        @endforeach
                    @endif
                </div>
            </div>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Overview</a>
        </div>
    </div>
@endif