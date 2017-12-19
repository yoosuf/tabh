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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="app-canvas" id="app">


    <nav class="navbar is-link is-fixed-top" role="navigation" aria-label="dropdown navigation">
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="navbar-start">
            </div>
            <div class="navbar-end">
                @if ( Auth::guard('admin')->check() )

                <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>



                            <div class="navbar-dropdown has-dropdown is-active is-boxed">

                              <a class="dropdown-item" href="{{ route('admin.account.profile') }}">My Profile</a>
                              <a class="dropdown-item" href="{{ route('admin.account.password') }}">Password</a>

                              <hr class="dropdown-divider">

                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                @endif
            </div>
    </nav>


    <div class="section">



        <div class="columns">



            <div class="app-sidebar column is-2">

                @include('layouts.admin.sidebar')

            </div>

            <div class="app-content column">
                @yield('content')
            </div>

        </div>

    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
