<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN DASHBOARD - Applications') }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-menu-admin>

        </x-nav-menu-admin>

    <div class="w-4/5 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1>{{ $application->first_name }} {{ $application->last_name }}</h1>
                    <p>Email: {{ $application->email }}</p>
                    <p>Phone: {{ $application->phone }}</p>
                    <p>Address: {{ $application->address }}</p>
                    <p>City: {{ $application->city }}</p>
                    <p>Postcode: {{ $application->postcode }}</p>
                    <p>Country: {{ $application->country }}</p>
                    <p>Vendor Name: {{ $application->vendor_name }}</p>
                    <p>Vendor Type: {{ $application->vendor_type }}</p>
                    <p>Vendor Description: {{ $application->vendor_description }}</p>
                    <p>Vendor Experience: {{ $application->vendor_experience }}</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>