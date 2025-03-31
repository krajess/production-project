<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vendor Application - Apply for your vendor now!') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p> Here form to send application: </p>
                    <form action="{{ route('applications.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Address</label>
                            <input type="text" name="address" id="address" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-200">City</label>
                            <input type="text" name="city" id="city" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="postcode" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Country</label>
                            <input type="text" name="country" id="country" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Name</label>
                            <input type="text" name="vendor_name" id="vendor_name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Type</label>
                            <input type="text" name="vendor_type" id="vendor_type" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Description</label>
                            <textarea name="vendor_description" id="vendor_description" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="vendor_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vendor Experience</label>
                            <textarea name="vendor_experience" id="vendor_experience" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn-dark">Send Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>