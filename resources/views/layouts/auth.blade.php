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
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="app">



        
        @yield('content')



        <footer class="footer">

            <div id="navcontainer">
                <ul>
                    {{--@if(request()->is('login'))--}}
                        {{--<li><a href="{{ url('/register')  }}">Sign up</a></li>--}}

                    {{--@elseif(request()->is('register'))--}}
                        {{--<li><a href="{{ url('/login')  }}">Sign in</a></li>--}}
                    {{--@elseif(request()->is('password*'))--}}
                        {{--<li><a href="{{ url('/login')  }}">Sign in</a></li>--}}
                    {{--@endif--}}
                    <li>Copyright &copy; {{ config('app.name') }}</li>
                </ul>
            </div>
        </footer>
    </div>

</body>
</html>
