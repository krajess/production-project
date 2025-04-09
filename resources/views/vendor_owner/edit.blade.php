<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('VENDOR MANAGEMENT') }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-vendor-owner>
            
        </x-nav-vendor-owner>

        <div class="w-4/5 py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-center font-bold mb-4">Update Vendor Information</h2>
                        <form action="{{ route('vendor_owner.update', $vendor->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Name</label>
                                <input type="text" name="name" id="name" value="{{ $vendor->name }}" class="form-input w-full mt-1 dark:bg-gray-700 dark:text-gray-200" maxlength="30" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Description</label>
                                <textarea name="description" id="description" class="form-input w-full mt-1 dark:bg-gray-700 dark:text-gray-200" maxlength="1000" required>{{ $vendor->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Email</label>
                                <input type="email" name="email" id="email" value="{{ $vendor->email }}" class="form-input w-full mt-1 dark:bg-gray-700 dark:text-gray-200" maxlength="250" required>
                            </div>
                            <div class="mb-4">
                                <h2> Vendor View Settings</h2>
                                <p class="text-sm text-gray-500">These settings will affect how your vendor page looks.</p>
                            </div>
                            <div class="mb-4">
                                <label for="background_color" class="block text-sm font-medium text-gray-700">Background Colour</label>
                                <input type="color" id="background_color" name="background_color" value="{{ $vendor->background_color ?? '#ffffff' }}" class="mt-1 block w-full">
                            </div>
                            
                            <div class="mb-4">
                                <label for="text_color" class="block text-sm font-medium text-gray-700">Business Name Colour</label>
                                <input type="color" id="text_color" name="text_color" value="{{ $vendor->text_color ?? '#000000' }}" class="mt-1 block w-full">
                            </div>

                            <div class="mb-4">
                                <label for="description_text_color" class="block text-sm font-medium text-gray-700">Business Description Colour</label>
                                <input type="color" id="description_text_color" name="description_text_color" value="{{ $vendor->description_text_color ?? '#000000' }}" class="mt-1 block w-full">
                            </div>
                            
                            <div class="mb-4">
                                <label for="button_text_color" class="block text-sm font-medium text-gray-700">View Vendor Button Text Colour</label>
                                <input type="color" id="button_text_color" name="button_text_color" value="{{ $vendor->button_text_color ?? '#ffffff' }}" class="mt-1 block w-full">
                            </div>
                            
                            <div class="mb-4">
                                <label for="button_background_color" class="block text-sm font-medium text-gray-700">View Vendor Button Background Colour</label>
                                <input type="color" id="button_background_color" name="button_background_color" value="{{ $vendor->button_background_color ?? '#007bff' }}" class="mt-1 block w-full">
                            </div>

                            <div class="mb-4">
                                <h2>Connect Stripe</h2>
                                <p class="text-sm text-gray-500">Connect your Stripe Account to complete your vendor process.</p>
                            </div>
                            
                            <div class="mb-4">
                                @if (!empty($vendor->stripe_account_id))
                                    <p class="text-green-500">Account connected successfully!</p>
                                    <p class="text-sm text-gray-500">Stripe Account ID: <strong>{{ $vendor->stripe_account_id }}</strong></p>
                                @else
                                    <a href="{{ route('vendor.stripe.link', ['vendor' => $vendor->id]) }}" class="btn-dark">Connect Stripe Account</a>
                                @endif
                            </div>
                            <button type="submit" class="btn-dark w-full mt-2">UPDATE DETAILS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>