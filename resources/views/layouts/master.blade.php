<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Styles -->
    @include('partials.styles')

    @stack('styles')

    <style>
        header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<header>
    @include('partials.nav')
</header>

@yield('content')

<!-- Scripts -->
@include('partials.scripts')

@stack('scripts')

</body>
</html>