<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $shop->name }}
        </h2>
    </x-slot>

    <div class="w-1/6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 m-4 flex flex-col items-center">
        <div class="text-gray-900 dark:text-gray-100 w-full">
            <h2> Filters </h2>
            
        </div>
    </div>

<head>
    <title>Shop Details</title>
</head>
<body>
    <p>{{ $shop->description }}</p>
    <p>Owner ID: {{ $shop->owner_id }}</p>

    <h2>Products</h2>
    @if($shop->products->isEmpty())
        <p>No products available for this shop.</p>
    @else
        <ul>
            @foreach($shop->products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Price: £{{ $product->price }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</x-app-layout>
