<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/admin.js') }}"></script>

</head>
<body>
    <div id="app">
        <div class="app-canvas">
            <div class="app-header">
                @include('layouts.admin.nav')

            </div>
            <div class="app-content-wrap">
                <div class="app-sidebar">
                    @include('layouts.admin.sidebar')
                </div>
                <div class="app-content">

                    @include('layouts.app._flash')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
</body>
</html>
