<div class="hero-head">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">

                <span class="navbar-item">
                    <a href="{{ url('/') }}">
                        Tab - H
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

                                                @if(auth()->user()->is_complete)

                                                    <a class="button is-small">Settings</a>

                                                @endif
                                            </div>
                                    </article>


                                </div>
                                @if(auth()->user()->is_complete)
                                    <hr class="dropdown-divider">

                                    <a class="dropdown-item" href="{{ route('account.orders') }}">My Orders</a>
                                    <a class="dropdown-item" href="{{ route('account.profile') }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('account.password') }}">Password</a>
                                @endif

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



                    {{--<a class="navbar-item is-active">--}}
                    {{--Home--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item">--}}
                    {{--Examples--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item">--}}
                    {{--Documentation--}}
                    {{--</a>--}}
                    {{--<span class="navbar-item">--}}
                    {{--<a class="button is-primary is-inverted">--}}
                    {{--<span class="icon">--}}
                    {{--<i class="fa fa-github"></i>--}}
                    {{--</span>--}}
                    {{--<span>Download</span>--}}
                    {{--</a>--}}
                    {{--</span>--}}
                </div>
            </div>
        </div>
    </nav>
</div>
