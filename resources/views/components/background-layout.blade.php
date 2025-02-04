@if (auth()->user()->is_admin)

<div class="flex">
    <div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <div class="text-center font-bold mb-4">
                <h2> {{ __("MANAGEMENT MENU") }} </h2>
            </div>
            <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">Dashboard</a>
            
            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Businesses</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.shops') }}" class="btn-dark block text-center">View Businesses</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Applications</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.index') }}" class="btn-dark mb-2 block text-center">View Applications</a>
                </div>
            </div>

            <div x-data="{ open: false }" class="w-full">
                <button @click="open = !open" class="btn-dark mb-2 block text-center w-full">Users</button>
                <div x-show="open" class="mt-2 space-y-2">
                    <a href="{{ route('admin.users') }}" class="btn-dark mb-2 block text-center">View Users</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to the admin dashboard!") }}
                </div>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->is_business_owner)

<div class="flex">
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

    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to the your shop dashboard!") }}
                </div>
            </div>
        </div>
    </div>
</div>

@endif