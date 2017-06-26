<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Styles -->
    @include('layouts.styles')

    @stack('styles')

    <style>
        header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<header>
    @include('layouts.nav')
</header>

@yield('content')

<!-- Scripts -->
@include('layouts.scripts')

@stack('scripts')

</body>
</html>