<!DOCTYPE html>
<html>
<head>
    <title>Shop Details</title>
</head>
<body>
    <h1>{{ $shop->name }}</h1>
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

    <a href="{{ route('shops.index') }}">Back to Shops</a>
</body>
</html>