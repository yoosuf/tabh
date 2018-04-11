<div class="hero-head">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">

                <span class="navbar-item Logo">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <a href="{{ url('/') }}">
                        <img class="logo logo-white" src="/img/logo_white.png">
                        <img class="logo logo-color" src="/img/logo_color1.png">
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
                    <span class="navbar-item"><a class="sign-in-btn navbar-link is-link is-inverted"
                       href="{{ route('login') }}">Sign in</a></span>
                       @else
                       <div class="navbar-item has-dropdowna is-hoverablea">

                        <a class="navbar-link" href="{{ url('search?type=pharmaceutical') }}">Search</a>
                        <a class="navbar-link" href="{{ route('account.orders') }}">My Orders</a>
                        <a class="navbar-link" href="{{ route('account.profile') }}" role="button"
                        aria-expanded="false" aria-haspopup="true">{{ auth()->user()->name }}</a>
                        <a class="navbar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                    out</a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
</div>
