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

        <div class="w-3/6 flex flex-col space-y-4 center">
            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-center"> USER STATISTICS</h1>
                            <p>Total Registered Users: {{ $total_users }}</p>
                            <p>Last Registered User: {{ $last_user->first_name }} {{ $last_user->last_name }}</p>
                            <p>Total Vendor Owners: {{$total_vendor_owners}}</p>
                            <button class="btn-dark">
                                <a href="{{ route('admin.users') }}">View Users -></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-center"> PRODUCTS STATISTICS</h1>
                            <p>Total Products: {{ $total_products }}</p>
                            @if($total_products > 0)
                                <p>Last Added Product: {{ $last_product->name }}</p>
                            @else
                            <p>Last Added Product: No products added recently.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-center"> VENDOR STATISTICS</h1>
                            <p>Total Vendors: {{ $total_vendors }}</p>
                            @if($total_vendors > 0)
                                <p>Last Regsitered Vendor: {{ $last_vendor->name }}</p>
                            @else
                            <p>Last Registered Vendor: No vendors available.</p>
                            @endif
                            <button class="btn-dark">
                                <a href="{{ route('admin.vendors') }}">View Vendors -></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-center"> APPLICATION STATISTICS</h1>
                            <p>Total Applications: {{ $total_applications }}</p>
                            <p>Last Application from: {{ $last_application->email }}</p>
                            <p>Applications Accepted: {{ $accepted_applications }}</p>
                            <p>Applications Rejected: {{ $rejected_applications }}</p>
                            <p>Applications Pending: {{ $pending_applications }}</p>
                            <p>Applications New: {{ $new_applications }}</p>
                            <button class="btn-dark">
                                <a href="{{ route('admin.applications') }}">View Applications -></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>