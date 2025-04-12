<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EDIT VENDOR - ') . $vendor->name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.update_vendor', $vendor->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $vendor->name) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('description', $vendor->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $vendor->email) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="stripe_account_id" class="block text-sm font-medium text-gray-700">Stripe Account ID</label>
                            <input type="text" name="stripe_account_id" id="stripe_account_id" value="{{ old('stripe_account_id', $vendor->stripe_account_id) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="visible" class="block text-sm font-medium text-gray-700">Visible</label>
                            <select name="visible" id="visible" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                <option value="1" {{ old('visible', $vendor->visible) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('visible', $vendor->visible) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="background_color" class="block text-sm font-medium text-gray-700">Background Color</label>
                            <input type="text" name="background_color" id="background_color" value="{{ old('background_color', $vendor->background_color) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="text_color" class="block text-sm font-medium text-gray-700">Text Color</label>
                            <input type="text" name="text_color" id="text_color" value="{{ old('text_color', $vendor->text_color) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <button type="submit" class="bg-green-700 text-white text-center px-4 py-2 rounded w-full mt-2">UPDATE VENDOR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>