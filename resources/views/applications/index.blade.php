<x-app-layout>
    @if($appSent == false)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Vendor Application - How to apply for your online store?') }}
            </h2>
        </x-slot>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p> To apply for your online store, please click the button below. </p>
                        <button> <a href="{{ route('applications.create') }}" class="btn-dark">Apply for your online store</a> </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Application Status - Here you can check status for your application !') }}
            </h2>
        </x-slot>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if($application->status == 'new')
                            <p> Status of your application is - NEW </p>
                            <p> We will be reviewing your application soon. </p>
                        @elseif($application->status == 'pending')
                            <p> Status of your application is - PENDING </p>
                            <p> We are reviewing your application - we will let you know when is done! </p>
                        @elseif($application->status == 'rejected')
                            <p> Status of your application is - REJECTED </p>
                            <p> Your application has been rejected. Reson: here messege to add </p>
                            <p> Please update your application and re-apply. </p>
                            <button> <a href="{{ route('applications.create') }}" class="btn-dark">Re-Apply for your online store</a> </button>
                        @elseif($application->status == 'accepted')
                            <p> Status of your application is - APPROVED </p>
                            <p> Your application has been approved. You can now start adding your products. </p>
                            <p> To manage your vendor, click email and go to Vendor Dashboard.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif  
</x-app-layout>