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
<div class="container">
    <div class="content row">
        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>

<!-- Scripts -->
@include('partials.scripts')

@stack('scripts')

</body>
</html>