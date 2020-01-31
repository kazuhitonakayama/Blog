<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>