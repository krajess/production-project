<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN MANAGEMENT - APPLICATION VIEW - ') }}
            {{ __($application->vendor_name) }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6">
            <x-nav-menu-admin>
            </x-nav-menu-admin>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4">
            <div class="w-full md:w-2/2 py-4 mr-4">
                <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg shadow-md">
                    <h1 class="text-2xl font-bold mb-4">{{ $application->first_name }} {{ $application->last_name }}</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-lg font-semibold">DOB:</p>
                            <p class="text-base">{{ $application->dob }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Email:</p>
                            <p class="text-base">{{ $application->email }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Phone:</p>
                            <p class="text-base">{{ $application->phone }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Address:</p>
                            <p class="text-base">{{ $application->address }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">City:</p>
                            <p class="text-base">{{ $application->city }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Postcode:</p>
                            <p class="text-base">{{ $application->postcode }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Country:</p>
                            <p class="text-base">{{ $application->country }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Vendor Name:</p>
                            <p class="text-base">{{ $application->vendor_name }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Vendor Type:</p>
                            <p class="text-base">{{ $application->vendor_type }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Vendor Description:</p>
                            <p class="text-base">{{ $application->vendor_description }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Vendor Experience:</p>
                            <p class="text-base">{{ $application->vendor_experience }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Terms and Conditions:</p>
                            <p class="text-base">{{ $application->terms_conditions ? 'Accepted' : 'Not Accepted' }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>