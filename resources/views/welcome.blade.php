<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to ECG - Your Trusted Multi-Vendor Marketplace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ __("We're excited to welcome you to ECG, where innovation meets opportunity. Whether you're here to discover top-quality products, grow your business, or connect with a diverse community of trusted vendors and buyers, you’ve come to the right place.") }}</p>
                    <br></br>
                    <p class="text-center">{{ __("Our platform brings together a vibrant ecosystem of sellers from various industries, offering everything from everyday essentials to unique, hard-to-find items. We’re committed to ensuring a seamless, secure, and rewarding experience for every user—whether you're making your first purchase or launching your next storefront.") }}</p>
                    <br></br>
                    <p>{{ __("At ECG, we prioritize quality, transparency, and customer satisfaction. Our tools and support systems are designed to help vendors thrive and customers shop with confidence. From intuitive dashboards to responsive customer service, every aspect of our platform is built with you in mind.") }}</p>
                    <br></br>
                    <p class="text-center">{{ __("Explore. Connect. Grow.") }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-center font-bold mb-4" style="font-size: 24px;">{{ __('FEATURED PRODUCTS') }}</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($randomProducts as $product)
                            <div class="border rounded-lg p-4 flex flex-col bg-white shadow-md">
                                <div class="relative" style="height: 200px; overflow: hidden;">
                                    @if (!empty($product->images) && is_array($product->images))
                                        <img id="mainImage-{{ $product->id }}" 
                                             src="{{ asset('storage/' . $product->images[0]) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-contain mb-4 rounded">
                                    @else
                                        <img id="mainImage-{{ $product->id }}" 
                                             src="{{ asset('placeholder.png') }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-contain mb-4 rounded">
                                    @endif
                                </div>
                                
                                @if (!empty($product->images) && is_array($product->images))
                                    <div class="flex mt-2 space-x-2">
                                        @foreach ($product->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" 
                                                 alt="Thumbnail" 
                                                 class="w-12 h-12 object-contain rounded cursor-pointer" 
                                                 onclick="document.getElementById('mainImage-{{ $product->id }}').src='{{ asset('storage/' . $image) }}'">
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex flex-col w-full mt-4">
                                    <div class="flex justify-between items-center mb-1">
                                        <p class="font-bold product-name text-lg">{{ $product->name }}</p>
                                        <p class="bg-blue-200 text-black px-2 rounded border border-black text-xs">{{ $product->product_types_name }}</p>
                                    </div>
                                    <p class="text-gray-700 mb-1 product-description">{{ $product->description }}</p>
                                    <p class="text-green-500 font-semibold mb-3">&pound {{ number_format($product->price, 2) }}</p>
                                    @if ($product->stock == 0)
                                        <p class="text-red-500 font-semibold mb-3 text-sm">Out of stock</p>
                                    @elseif ($product->stock < 10)
                                        <p class="text-orange-300 font-semibold mb-3 text-sm">Low in stock - {{ $product->stock }} available</p>
                                    @else
                                        <p class="text-black-700 mb-3 text-sm">In stock - 10+ available</p>
                                    @endif
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full mb-2" 
                                            onclick="window.location='{{ route('vendors.products.show', ['vendor' => $product->vendor_id, 'product' => $product->id]) }}'">
                                        {{ __('View Product') }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="py-12">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-center font-bold mb-4" style="font-size: 24px;">{{ __('FEATURED VENDORS') }}</h3>
                            <ul>
                                @if ($randomVendor)
                                    <li class="mb-6 p-4 rounded-lg"
                                        style="background-color: {{ $randomVendor->background_color ?? '#ffffff' }};
                                               color: {{ $randomVendor->text_color ?? '#000000' }};
                                               box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3), 0 -6px 8px rgba(0, 0, 0, 0.3);">
                                        <h2 class="font-bold text-center m-2" style="font-size: 30px;">{{ $randomVendor->name }}</h2>
                                        <p class="text-center" style="font-size: 18px; color: {{ $randomVendor->description_text_color ?? '#000000' }};">
                                            {!! nl2br(e($randomVendor->description)) !!}
                                        </p>
                                        <div class="text-right">
                                            <a href="{{ route('products.show_products', $randomVendor->id) }}" 
                                               class="btn-dark"
                                               style="color: {{ $randomVendor->button_text_color ?? '#ffffff' }};
                                                      background-color: {{ $randomVendor->button_background_color ?? '#007bff' }};">
                                                Visit Store ->
                                            </a>
                                        </div>
                                        <div class="flex items-center justify-between mt-4">
                                            <p class="text-gray-700" style="font-size: 12px; font-weight: bold; text-align: left;">
                                                Total Products:
                                            </p>
                                            <p class="text-gray-700 text-center" style="font-size: 12px; font-weight: bold; margin: 0 auto;">
                                                Email: {{ $randomVendor->email }}
                                            </p>
                                        </div>
                                    </li>
                                    <div class="w-4/5 border-t border-gray-300 my-4 mx-auto"></div>
                                @else
                                    <p class="text-center text-gray-500">{{ __('No vendor available at the moment.') }}</p>
                                @endif
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>