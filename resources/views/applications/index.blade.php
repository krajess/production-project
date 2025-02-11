<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Business Application - How to apply for your online store?') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p> here how to apply etc.: </p>
                    <buton> <a href="{{ route('applications.create') }}" class="btn-dark">Go to form button</a> </buton>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>