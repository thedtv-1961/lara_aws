<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hi</title>
</head>
<body>
    This TOP page
    @can('check-admin-gate')
        <a href="{{ route('check_admin_gate') }}">Go to Admin Page</a>
    @endcan
</body>
</html>
