<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Connect Stripe Account') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/6">
            <x-nav-vendor-owner>
            </x-nav-vendor-owner>
        </div>

        <div class="w-5/6 flex flex-wrap gap-4 mr-4">
            <div class="w-full md:w-2/2 py-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <h2 class="text-lg">Connect Stripe</h2>
                            <p class="text-sm text-gray-500">Connect your Stripe Account to complete your vendor process.</p>
                        </div>
                        
                        <div class="mb-4">
                            @if (!empty($vendor->stripe_account_id))
                                <p class="text-green-500">Account connected successfully!</p>
                                <p class="text-sm text-gray-500">Stripe Account ID: <strong>{{ $vendor->stripe_account_id }}</strong></p>
                            @else
                                <a href="{{ route('vendor_owner.connect_stripe', ['vendor' => $vendor->id]) }}" class="btn-dark text-center">CONNECT YOUR STRIPE ACCOUNT</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>