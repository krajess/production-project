<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN DASHBOARD') }}
        </h2>
    </x-slot>
    
    <div class="flex">
        <x-nav-menu-admin>
            
        </x-nav-menu-admin>


    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p> Welcome to the admin dashboard! </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>