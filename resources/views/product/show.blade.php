<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Name</td>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>{{ $product->price }}</td>
        </tr>
    </table>
</table>
</body>
</html>
