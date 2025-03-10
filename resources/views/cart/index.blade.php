<div class="container">
    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($cart && $cart->products->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>&pound;{{ number_format($product->price, 2) }}</td>
                        <td>&pound;{{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                            <form action="{{ route('cart.remove', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove Productc</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>