<div class="hero-head">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">

                <span class="navbar-item Logo">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <a href="{{ url('/') }}">
                        <img src="/img/logo.png">
                    </a>
                </span>

                <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
                <div class="navbar-end">
                    @guest
                    <span class="navbar-item"><a class="button is-link is-inverted" href="{{ route('login') }}">Sign in</a></span>
                    @else
                    <div class="navbar-item has-dropdowna is-hoverablea">

                        <a class="navbar-link" href="{{ route('account.orders') }}">My Orders</a>
                        <a class="navbar-link" href="{{ route('account.profile') }}" role="button" aria-expanded="false" aria-haspopup="true">{{ auth()->user()->name }}</a>
                        <!-- <a class="navbar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> -->
                        <a class="navbar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        <!-- <div class="navbar-dropdown is-right has-dropdown is-active is-boxed"> -->
                            <!-- <div class="dropdown-item"> -->

                                <!-- <div class="media">
                                    <div class="media-content">
                                        <div class="content">

                                            <p>{{ auth()->user()->name }}</p>


                                            {{-- <a class="button is-small">Settings</a>--}}

                                        </div>
                                    </div>


                                </div> -->
                                <!-- <hr class="dropdown-divider"> -->

                                <!-- <a class="dropdown-item" href="{{ route('account.orders') }}">My Orders</a> -->
                                <!-- <a class="dropdown-item" href="{{ route('account.profile') }}">My Profile</a> -->
                                <!-- <a class="dropdown-item" href="{{ route('account.password') }}">Password</a> -->

                                <!-- <hr class="dropdown-divider"> -->

                                <!-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <!-- </div> -->
                                <!-- </div> -->
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
