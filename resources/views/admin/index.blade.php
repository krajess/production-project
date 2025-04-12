<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('ADMIN MANAGEMENT - DASHBOARD') }}
        </h2>
    </x-slot>
    
    <div class="flex">
        <div class="w-1/6">
            <x-nav-menu-admin>
            </x-nav-menu-admin>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4">
            <div class="w-full md:w-2/2 py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white text-gray-900 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h1 class="text-center text-3xl font-extrabold mb-6">USER STATISTICS</h1>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Registered Users:</p>
                                    <p class="text-2xl font-bold">{{ $total_users }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Last Registered User:</p>
                                    <p class="text-2xl font-bold">{{ $last_user->first_name }} {{ $last_user->last_name }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Vendor Owners:</p>
                                    <p class="text-2xl font-bold">{{ $total_vendor_owners }}</p>
                                </div>
                            </div>
                            <div class="mt-8 text-right">
                                <a href="{{ route('admin.users') }}" class="inline-block bg-gray-800 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-500 transition">
                                    View Users →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/2 py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white text-gray-900 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h1 class="text-center text-3xl font-extrabold mb-6">PRODUCTS STATISTICS</h1>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Products:</p>
                                    <p class="text-2xl font-bold">{{ $total_products }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    @if($total_products > 0)
                                        <p class="text-lg font-semibold">Last Added Product:</p>
                                        <p class="text-2xl font-bold">{{ $last_product->name }}</p>
                                    @else
                                        <p class="text-lg font-semibold">Last Added Product:</p>
                                        <p class="text-2xl font-bold">No products added recently.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/2 py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white text-gray-900 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h1 class="text-center text-3xl font-extrabold mb-6">VENDOR STATISTICS</h1>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Vendors:</p>
                                    <p class="text-2xl font-bold">{{ $total_vendors }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    @if($total_vendors > 0)
                                        <p class="text-lg font-semibold">Last Registered Vendor:</p>
                                        <p class="text-2xl font-bold">{{ $last_vendor->name }}</p>
                                    @else
                                        <p class="text-lg font-semibold">Last Registered Vendor:</p>
                                        <p class="text-2xl font-bold">No vendors available.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-8 text-right">
                                <a href="{{ route('admin.vendors') }}" class="inline-block bg-gray-800 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-500 transition">
                                    View Vendors →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/2 py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white text-gray-900 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h1 class="text-center text-3xl font-extrabold mb-6">APPLICATION STATISTICS</h1>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Total Applications:</p>
                                    <p class="text-2xl font-bold">{{ $total_applications }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Last Application From:</p>
                                    <p class="text-2xl font-bold">{{ $last_application->email }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Applications Accepted:</p>
                                    <p class="text-2xl font-bold">{{ $accepted_applications }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Applications Rejected:</p>
                                    <p class="text-2xl font-bold">{{ $rejected_applications }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Applications Pending:</p>
                                    <p class="text-2xl font-bold">{{ $pending_applications }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
                                    <p class="text-lg font-semibold">Applications New:</p>
                                    <p class="text-2xl font-bold">{{ $new_applications }}</p>
                                </div>
                            </div>
                            <div class="mt-8 text-right">
                                <a href="{{ route('admin.applications') }}" class="inline-block bg-gray-800 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-500 transition">
                                    View Applications →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>