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



<nav class="navbar is-info is-fixed-top is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{route('home')}}">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
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
      @guest
                    <a class="navbar-item" href="{{ route('login') }}">Login</a>
                    <a class="navbar-item" href="{{ route('register') }}">Register</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">


                            <a href="#" class="navbar-link" role="button" aria-expanded="false" aria-haspopup="true">
                                Account
                            </a>
                            <div class="navbar-dropdown is-right has-dropdown is-active is-boxed">

                              <div class="dropdown-item">



                                    <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-24x24">
                                        <img src="https://bulma.io/images/placeholders/32x32.png">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                        
                                        <p>{{ Auth::user()->name }}</p>
                                        
                                        </div>
                                    </article>



        
                                </div>
                            <hr class="dropdown-divider">

                              <a class="dropdown-item" href="{{ route('account.orders') }}">My Orders</a>
                              <a class="dropdown-item" href="{{ route('account.profile') }}">My Profile</a>
                              <a class="dropdown-item" href="{{ route('account.password') }}">Password</a>

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



    <!-- <nav class="navbar is-info is-fixed-top" role="navigation" aria-label="dropdown navigation">
        <div class="container">

           <button class="button navbar-burger">
      <span></span>
      <span></span>
      <span></span>
    </button>
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
                                Account
                            </a>
                            <div class="navbar-dropdown is-right has-dropdown is-active is-boxed">

                              <div class="dropdown-item">



                                    <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-24x24">
                                        <img src="https://bulma.io/images/placeholders/32x32.png">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                        
                                        <p>{{ Auth::user()->name }}</p>
                                        
                                        </div>
                                    </article>



        
                                </div>
                            <hr class="dropdown-divider">

                              <a class="dropdown-item" href="{{ route('account.orders') }}">My Orders</a>
                              <a class="dropdown-item" href="{{ route('account.profile') }}">My Profile</a>
                              <a class="dropdown-item" href="{{ route('account.password') }}">Password</a>

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
    </nav> -->

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
