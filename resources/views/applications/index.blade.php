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
                        <p class="text-lg mb-6">Applying to become a venor owner on our platform is quick and easy!</p>
                        <br />
                        <p class="text-lg mb-6">1. Click the "Apply for your online vendor" button below.</p>
                        <p class="text-lg mb-6">2. Fill out the simple form with the required details.</p>
                        <p class="text-lg mb-6">3. Submit your application and wait for the result!</p>
                        <br />
                        <p class="text-lg mb-6">Once you submit your application, we will review it and get back to you as soon as possible.</p>
                        <p class="text-lg mb-6">Thank you for your interest in joining our platform! </p>
                        <p class="text-lg mb-6">It is your time to Explore our offers, Connect with us and Grow your business!</p>
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
                                <h1 class="text-3xl font-extrabold mb-6">Your application has been successfully submitted.</h1>
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-blue-500">NEW</span></p>
                                <p>We will be reviewing your application soon.</p>
                                <p class="mt-4">Please check back later for updates.</p>
                            </div>
                        @elseif($application->status == 'pending')
                            <div class="text-center">
                                <p class="text-xl font-semibold mb-4">Status: <span class="text-yellow-500">PENDING</span></p>
                                <p>We are reviewing your application. We will let you know when it's done!</p>
                                <br />
                                <p> If there is a need of any additional information, we will contact you via email.</p>

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
                                <br />
                                @if(isset($vendor) && $vendor->visible)
                                    <p class="text-lg font-semibold text-green-500">Your vendor is now visible to other users!</p>
                                    <br />
                                    <p>Visibility Status: <span class="text-green-500">Visible</span></p>
                                @elseif(isset($vendor))
                                    <p class="text-lg font-semibold text-red-500">Your vendor is currently invisible to other users.</p>
                                    <br />
                                    <p>Visibility Status: <span class="text-red-500">Not Visible</span></p>
                                    <br />
                                    <p>To complete your vendor application, please follow these steps:</p>
                                    <br />
                                    <p>1. Go to your Account</p>
                                    <p>2. Navigate to your <a href="{{ route('vendor_owner.index') }}" class="text-blue-500 underline">Vendor Dashboard</a></p>
                                    <p>3. Click on your Vendor in Managemen Menu.</p>
                                    <p>4. Update Informations and Connect your Stripe Account.</p>
                                    <br />
                                    <p>Once your Stripe account is successfully connected, our team will review it within 24 hours and make your vendor visible to others.</p>
                                    <br />
                                    <p>While waiting for the final verification of your Stripe account, you can start adding products to your vendor and prepare your store for launch!</p>
                                @else
                                    <p class="text-lg font-semibold text-red-500">Vendor information is not available. Please contact support.</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>