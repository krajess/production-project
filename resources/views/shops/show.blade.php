<!DOCTYPE html>
<html>
<head>
    <title>Shop Details</title>
</head>
<body>
    <h1>{{ $shop->name }}</h1>
    <p>{{ $shop->description }}</p>
    <p>Owner ID: {{ $shop->owner_id }}</p>
    <a href="{{ route('shops.index') }}">Back to Shops</a>
</body>
</html>