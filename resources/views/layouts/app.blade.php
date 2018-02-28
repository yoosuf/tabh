<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">

        @yield('content')
    </div>


    <!-- Scripts -->

    <script>
    $(function() {
        $('#shop_groceries').on('click', function (e) {
            e.preventDefault();
            $(this).replaceWith( "<p style=\"padding-top: 24px; line-height: 2\">Coming soon.</p>" );
        });
    })
    </script>
</body>
</html>
