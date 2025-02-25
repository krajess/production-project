<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SHOP DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="flex">
        <x-nav-shop-owner>
            
        </x-nav-shop-owner>

        <div class="w-4/5 py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-center font-bold mb-4">Edit Shop</h2>
                        <form action="{{ route('shop_owner.update', $shop->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                <input type="text" name="name" id="name" value="{{ $shop->name }}" class="form-input w-full mt-1 dark:bg-gray-700 dark:text-gray-200" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                                <textarea name="description" id="description" class="form-input w-full mt-1 dark:bg-gray-700 dark:text-gray-200" required>{{ $shop->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="visible" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Visible</label>
                                <input type="checkbox" name="visible" id="visible" {{ $shop->visible ? 'checked' : '' }}>
                            </div>
                            <button type="submit" class="btn-dark mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>