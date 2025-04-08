<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('VENDOR APPLICATION - Apply for your vendor now!') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p> To apply for your vendor, please fill out the form below. </p>
                    <p> Once you submit your application, we will review it and get back to you as soon as possible. </p>
                    <p> After submission, you will have access to your Application Status where you can see the progress of your application process. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('applications.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-m font-bold text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="50" required />
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-m font-bold text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="50" required />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-m font-bold text-gray-700">Email</label>
                            <p class="text-gray-500 text-sm">This should be an email that you will use for your vendor.</p>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="250" required />
                        </div>
                        <div class="mb-4">
                            <label for="dob" class="block text-m font-bold text-gray-700">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-m font-bold text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="15" required />
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-m font-bold text-gray-700">Address</label>
                            <p class="text-gray-500 text-sm">Registered address of your company or residence.</p>
                            <input type="text" name="address" id="address" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="50" required />
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-m font-bold text-gray-700">City</label>
                            <input type="text" name="city" id="city" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="50" required />
                        </div>
                        <div class="mb-4">
                            <label for="postcode" class="block text-m font-bold text-gray-700">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="10" required />
                        </div>
                        <div class="mb-4">
                            <label for="country" class="block text-m font-bold text-gray-700">Country</label>
                            <input type="text" name="country" id="country" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="50" required />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_name" class="block text-m font-bold text-gray-700">Vendor Name</label>
                            <p class="text-gray-500 text-sm">Max. 30 characters.</p>
                            <input type="text" name="vendor_name" id="vendor_name" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="30" required />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_type" class="block text-m font-bold text-gray-700">Vendor Type</label>
                            <p class="text-gray-500 text-sm">Max. 250 characters.</p>
                            <p class="text-gray-500 text-sm">Type of the products you will be selling.</p>
                            <input type="text" name="vendor_type" id="vendor_type" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="250" required />
                        </div>
                        <div class="mb-4">
                            <label for="vendor_description" class="block text-m font-bold text-gray-700">Vendor Description</label>
                            <p class="text-gray-500 text-sm">Max. 1000 characters.</p>
                            <p class="text-gray-500 text-sm">Please provide a professional description of what your vendor offers in terms of sales.</p>
                            <textarea name="vendor_description" id="vendor_description" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="1000" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="vendor_experience" class="block text-m font-bold text-gray-700">Vendor Experience</label>
                            <p class="text-gray-500 text-sm">Max. 1000 characters.</p>
                            <p class="text-gray-500 text-sm">Provide your experience with selling products and services online.</p>
                            <textarea name="vendor_experience" id="vendor_experience" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="1000" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="terms_conditions" class="block text-m font-bold text-gray-700">Terms & Conditions</label>
                            <p class="text-gray-500 text-sm">Please read and accept our terms and conditions.</p>
                            <input type="checkbox" name="terms_conditions" id="terms_conditions" class="form-checkbox rounded-md shadow-sm mt-1 block w-1/4" value="1" required />
                            <label for="terms_conditions" class="text-gray-500 text-sm">I accept the terms and conditions.</label>
                        </div>
                        <button type="submit" class="btn-dark">Send Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>