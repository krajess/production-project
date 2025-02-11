@if (auth()->user()->is_business_owner)
    <div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <div class="text-center font-bold mb-4">
                <h2> {{ __("MANAGEMENT MENU") }} </h2>
            </div>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Store</a>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Product</a>
            <a href="{{ route('shop_owner.index') }}" class="btn-dark mb-2 block text-center">Overview</a>
        </div>
    </div>
@endif