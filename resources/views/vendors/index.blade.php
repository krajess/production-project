<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Explore Our Network of Partnership Vendors!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        @foreach ($vendors as $vendor)
                            <li class="mb-6 p-4 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900">
                                <h2 class="font-bold text-center m-2" style="font-size: 30px;">{{ $vendor->name }}</h2>
                                <p class="text-gray-700 dark:text-gray-300 text-center" style="font-size: 20px;">{{ $vendor->description }}</p>
                                <p class="text-gray-700 dark:text-gray-300" style="font-size: 20px;">Tags:</p>
                                <p class="text-gray-700 dark:text-gray-300" style="font-size: 20px;">Email:</p>
                                <p class="text-gray-700 dark:text-gray-300" style="font-size: 20px;">Reviews: </p>
                                <div class="text-right">
                                    <a href="{{ route('products.show_products', $vendor->id) }}" class="btn-dark">Visit Store -></a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>