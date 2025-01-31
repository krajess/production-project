<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SHOP DASHBOARD') }}
        </h2>
    </x-slot>

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
</x-app-layout>