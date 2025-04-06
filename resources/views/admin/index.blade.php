<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('ADMIN MANAGEMENT DASHBOARD') }}
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1> PRODUCTS STATISTICS</h1>
                            <p>Total Products: {{ $total_products }}</p>
                            <p>Last Added Product: {{ $last_product }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1> VENDOR STATISTICS</h1>
                            <p>Total Vendors: {{ $total_vendors }}</p>
                            <p>Last Added Vendor: {{ $last_vendor }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full py-4">
                <div class="max-w mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1> APPLICATION STATISTICS</h1>
                            <p>Total Applications: {{ $total_applications }}</p>
                            <p>Last Application: {{ $last_application->email }}</p>
                            <p>Applications Accepted: {{ $accepted_applications }}</p>
                            <p>Applications Rejected: {{ $rejected_applications }}</p>
                            <p>Applications Pending: {{ $pending_applications }}</p>
                            <p>Applications New: {{ $new_applications }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>