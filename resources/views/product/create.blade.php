<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <style>
        .alert {
            color: red;
        }
    </style>
</head>
<body>
<h3>Product Create</h3>
<a href="{{ route('product.index') }}">Product List</a>
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Price:</td>
            <td>
                <input type="number" name="price" value="{{ old('price', 0) }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Save Type:</td>
            <td>
                <p style="display: inline">
                    <input type="radio" name="type" value="0" checked>
                    Local
                </p>
                <p style="display: inline">
                    <input type="radio" name="type" value="1">
                    S3
                </p>
            </td>
        </tr>
        <tr>
            <td>Image:</td>
            <td>
                <input type="file" name="image">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Save">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
