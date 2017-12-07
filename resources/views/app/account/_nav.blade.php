<div class="tabs is-centered">
    <ul>
        <li class="{{ Request::is('account/orders') ? 'is-active' : null }}"><a href="{{ route('account.orders') }}">My Orders</a></li>
        <li class="{{ Request::is('account/profile') ? 'is-active' : null }}"><a href="{{ route('account.profile') }}">My Profile</a></li>
        <li class="{{ Request::is('account/address') ? 'is-active' : null }}"><a class="" href="{{ route('account.address') }}">Addresses</a></li>
        <li class="{{ Request::is('account/password') ? 'is-active' : null }}"><a class="" href="{{ route('account.password') }}">Password</a></li>
    </ul>
</div>


