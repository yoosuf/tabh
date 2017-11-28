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
</head>
<body>
<div id="app">
    <nav class="navbar is-info is-fixed-top" role="navigation" aria-label="dropdown navigation">
        <div class="container">
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="navbar-start">
            </div>
            <div class="navbar-end">
                @guest
                    <a class="navbar-item" href="{{ route('login') }}">Login</a>
                    <a class="navbar-item" href="{{ route('register') }}">Register</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="navbar-dropdown has-dropdown is-active is-boxed">

                              <a class="dropdown-item" href="#">My Orders</a>
                              <a class="dropdown-item" href="#">My Profile</a>
                              <a class="dropdown-item" href="#">Password</a>

                              <hr class="dropdown-divider">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                @endguest
            </div>
        </div>
    </nav>

    @yield('content')


    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Quicksilver</strong>.
                </p>
            </div>
        </div>
    </footer>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
