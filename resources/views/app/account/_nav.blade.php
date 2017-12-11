



<aside class="menu">
    <figure class="image is-128x128">
        <img src="{{ getProfileAvatar() }}">


    </figure>
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('account.orders') }}" class="{{ Request::is('account/orders') ? 'is-active' : null }}">My Orders</a></li>
        <li><a href="{{ route('account.profile') }}" class="{{ Request::is('account/profile') ? 'is-active' : null }}">Profile</a></li>
        <li><a href="{{ route('account.address') }}" class="{{ request()->is('account/address*') ? 'is-active' : null }}">Addresses</a></li>
        <li><a href="{{ route('account.password') }}" class="{{ Request::is('account/password') ? 'is-active' : null }}">Password</a></li>

    </ul>


</aside>




