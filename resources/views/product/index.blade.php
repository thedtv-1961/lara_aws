<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <style>
        .product-img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<p>User: {{ $user_name }} | <a href="{{ route('authentication.logout') }}">Logout</a></p>
<h3>Product List</h3>
<a href="{{ route('product.create') }}">New</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Username created</th>
        <th>Price</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                <img class="product-img" src="{{ $product->image }}">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? '' }}</td>
            <td>{{ $product->user->username ?? '' }} ({{ $product->user->name ?? '' }})</td>
            <td>{{ $product->price }}</td>
            <td>
                @can('view', $product)
                    <a href="{{ route('product.show', ['id' => $product->id]) }}">Edit</a>
                @else
                    <span>Edit //Pls login with this product owner//</span>
                @endcan
                |
                <span>Delete</span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
