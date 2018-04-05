



<aside class="menu">
	<ul class="menu-list">
		<li><a href="{{ route('account.profile') }}" class="{{ Request::is('account/profile') ? 'is-active' : null }}">Profile</a></li>
		<li><a href="{{ route('account.orders') }}" class="{{ Request::is('account/orders') ? 'is-active' : null }} {{ Request::is('account/order') ? 'is-active' : null }}">My Orders</a></li>
		<li><a href="{{ route('account.address') }}" class="{{ request()->is('account/address*') ? 'is-active' : null }}">Addresses</a></li>
		<li><a href="{{ route('account.password') }}" class="{{ Request::is('account/password') ? 'is-active' : null }}">Password</a></li>

		<li><a href="{{ route('account.promos') }}" class="{{ Request::is('account/promos') ? 'is-active' : null }}">Promo codes</a></li>


	</ul>


</aside>




