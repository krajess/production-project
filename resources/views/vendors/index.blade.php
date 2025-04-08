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
                        <li class="mb-6 p-4 rounded-lg"
                            style="background-color: {{ $vendor->background_color ?? '#ffffff' }};
                                   color: {{ $vendor->text_color ?? '#000000' }};
                                   box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3), 0 -6px 8px rgba(0, 0, 0, 0.3);">
                            <h2 class="font-bold text-center m-2" style="font-size: 30px;">{{ $vendor->name }}</h2>
                            <p class="text-center" style="font-size: 18px; color: {{ $vendor->description_text_color ?? '#000000' }};">
                                {!! nl2br(e($vendor->description)) !!}
                            </p>
                            <div class="text-right">
                                <a href="{{ route('products.show_products', $vendor->id) }}" 
                                   class="btn-dark"
                                   style="color: {{ $vendor->button_text_color ?? '#ffffff' }};
                                          background-color: {{ $vendor->button_background_color ?? '#007bff' }};">
                                    Visit Store ->
                                </a>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <p class="text-gray-700" style="font-size: 12px; font-weight: bold; text-align: left;">
                                    Reviews:
                                </p>
                                <p class="text-gray-700 text-center" style="font-size: 12px; font-weight: bold; margin: 0 auto;">
                                    Email: {{$vendor->email}}
                                </p>
                            </div>
                        </li>
                        <div class="w-4/5 border-t border-gray-300 my-4 mx-auto"></div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>