<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        @foreach ($vendors as $vendor)
                            <li>
                                <h2>Vendor Name: {{ $vendor->name }} </h2>
                                <p>Vendor Description: {{ $vendor->description }} </p>
                                <a href="{{ route('vendors.show', $vendor->id) }}" class="btn-dark mb-2 block text-center">Visit Store</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>