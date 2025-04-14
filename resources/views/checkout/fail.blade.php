<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAYMENT UNSUCCESSFUL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-red-500 text-center text-lg font-bold mb-4">Your payment was unsuccessful. Please try again or contact vendor owner.</p>
                    <div class="flex items-center justify-center h-full">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('cart.index') }}'">
                            Go Back to Your Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>