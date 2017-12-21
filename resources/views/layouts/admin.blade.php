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
    <div class="navbar-start is-hidden-desktop is-hidden-widescreen">

        <a href="{{ route('admin.dashboard') }}" class="navbar-item {{ Request::is('admin') ? 'is-active' : null }}">Dashboard</a>
        <a href="{{ route('admin.orders') }}" class="navbar-item {{ Request::is('admin/orders*') ? 'is-active' : null }}">Orders</a>
        <a href="{{ route('admin.products') }}" class="navbar-item {{ Request::is('admin/products*') ? 'is-active' : null }}">Products</a>
        <a href="{{ route('admin.customers') }}" class="navbar-item {{ Request::is('admin/customers*') ? 'is-active' : null }}">Customers</a>
        <a href="{{ route('admin.partners') }}" class="navbar-item  {{ Request::is('admin/settings/partners*') ? 'is-active' : null }}">Partners</a>
        <a href="{{ route('admin.users') }}" class="navbar-item  {{ Request::is('admin/settings/users*') ? 'is-active' : null }}">Users</a>
        <hr class="dropdown-divider">

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



<!-- is-hidden-desktop -->



      

    </div>
  </div>
</nav>



    


    <div class="section">



        <div class="columns">



            <div class="app-sidebar column is-2 is-hidden-tablet-only">

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
