<x-app-layout>
    @if($appSent == false)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Vendor Application - How to apply for your online vendor?') }}
            </h2>
        </x-slot>
        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-8 text-gray-900 dark:text-gray-100 text-center">
                        <p class="text-lg mb-6">To apply for your online vendor, please click the button below.</p>
                        <a href="{{ route('applications.create') }}" class="btn-dark px-6 py-3 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300">
                            Apply for your online vendor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Application Status - Here you can check status for your application!') }}
            </h2>
        </x-slot>
        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-8 text-gray-900 dark:text-gray-100">
                        @if($application->status == 'new')
                            <div class="text-center">
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-blue-500">NEW</span></p>
                                <p>We will be reviewing your application soon.</p>
                            </div>
                        @elseif($application->status == 'pending')
                            <div class="text-center">
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-yellow-500">PENDING</span></p>
                                <p>We are reviewing your application. We will let you know when it's done!</p>
                            </div>
                        @elseif($application->status == 'rejected')
                            <div class="text-center">
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-red-500">REJECTED</span></p>
                                <p>Your application has been rejected. Reason: <span class="italic">[Not enough information provided.]</span></p>
                                <p class="mt-4">Please update your application and re-apply.</p>
                                <a href="{{ route('applications.create') }}" class="btn-dark px-6 py-3 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300 mt-4 inline-block">
                                    Re-Apply for your online store
                                </a>
                            </div>
                        @elseif($application->status == 'accepted')
                            <div class="text-center">
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-green-500">APPROVED</span></p>
                                <p>Your application has been approved.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>