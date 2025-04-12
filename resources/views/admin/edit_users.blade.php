<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('EDIT USER - ') }}
            {{ $user->first_name }} {{ $user->last_name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="is_vendor_owner" class="block text-sm font-medium text-gray-700">Is Vendor Owner</label>
                            <select name="is_vendor_owner" id="is_vendor_owner" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="1" {{ $user->is_vendor_owner ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$user->is_vendor_owner ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="is_customer" class="block text-sm font-medium text-gray-700">Is Customer</label>
                            <select name="is_customer" id="is_customer" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="1" {{ $user->is_customer ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$user->is_customer ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-green-700 text-white text-center px-4 py-2 rounded w-full mt-2">UPDATE USER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>