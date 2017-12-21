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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/temp_styles.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @yield('content')

        {{-- <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <strong>{{ config('app.name', 'Laravel') }}</strong>.
                    </p>
                </div>
            </div>
        </footer> --}}
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
