<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src='{{ asset('css/bootstrap/js/bootstrap.bundle.min.js') }}'></script>
    <link rel="stylesheet" href='{{ asset('icons/css/all.min.css') }}' />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>Dynamic Form Builder</title>
</head>

<body>
    @include('includes.nav')
    @yield('body')
</body>

</html>
