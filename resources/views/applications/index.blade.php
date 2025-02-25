<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Business Application - How to apply for your online store?') }}
        </h2>
    </x-slot>

    @if(Auth::user()->is_business_owner != 1)
        @if($appSent)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p> You have already sent an application. </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p> Here is how to apply etc.: </p>
                            <button> <a href="{{ route('applications.create') }}" class="btn-dark">Go to form button</a> </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @elseif(Auth::user())
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p> You are already a business owner. </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>