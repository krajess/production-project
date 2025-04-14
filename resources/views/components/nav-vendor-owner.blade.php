@if (auth()->user()->is_vendor_owner)
    <div class="w-1/7 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <div class="text-center font-bold mb-4">
                <h2> {{ __("MANAGEMENT MENU") }} </h2>
            </div>
            <a href="{{ route('vendor_owner.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
            <div x-data="{ open: false }" class="w-full">
                @if (auth()->user()->vendors && auth()->user()->vendors->count() > 0)
                    @foreach (auth()->user()->vendors as $vendor)
                        <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">{{ $vendor->name }}</button>
                    @endforeach
                @else
                    <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">No Active Vendor</button>
                @endif
                
                <div x-show="open" class="mt-2 space-y-2">
                    @if (auth()->user()->vendors && auth()->user()->vendors->count() > 0)
                        @foreach (auth()->user()->vendors as $vendor)
                            <a href="{{ route('vendor_owner.edit', $vendor->id) }}" class="btn-bright block text-center">Update Information</a>
                        @endforeach
                    @else
                        <a href="{{ route('vendor_owner.edit', $vendor->id) }}" class="btn-bright block text-center" disabled>No Active Vendor</a>
                    @endif
                </div>
            </div>
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Products</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('products.create', $vendor->id) }}" class="btn-bright block text-center">Add Product</a>
                    <a href="{{ route('products.manage_products', $vendor->id) }}" class="btn-bright block text-center" style="margin-bottom: 8px;" >Manage Products</a>
                </div>
            </div>
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Overview</button>
                <div x-show="open" class="mt-2 space-y-2">
                    @if (auth()->id() === $vendor->owner_id)
                        <a href="{{ route('vendor_owner.preview', $vendor->id) }}" class="btn-bright block text-center">Preview Vendor</a>
                    @endif
                </div>
            </div>
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Stripe Account</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('vendor.stripe.dashboard', $vendor->id) }}" class="btn-bright block text-center">View Transactions</a>
                </div>
            </div>
        </div>
    </div>
@endif