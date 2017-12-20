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

<nav class="navbar is-link">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">

      
    </div>

    <div class="navbar-end">
      
        <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="{{ route('admin.account.profile') }}">
          {{ Auth::guard('admin')->user()->name }}
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="{{ route('admin.account.profile') }}">
            My Profile
          </a>
          <a class="navbar-item" href="{{ route('admin.account.password') }}">
            Password
          </a>
          
          <hr class="dropdown-divider">
          <a class="navbar-item" href="{{ route('admin.logout') }}"
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

    </div>
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
