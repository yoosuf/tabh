<aside class="menu is-hidden-tablet-only is-hidden-mobile admin-side-menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin') ? 'is-active' : null }}">Dashboard</a></li>
        <li><a href="{{ route('admin.orders') }}" class="{{ Request::is('admin/orders*') ? 'is-active' : null }}">Orders</a></li>
        <li><a href="{{ route('admin.products') }}" class="{{ Request::is('admin/products*') ? 'is-active' : null }}">Products</a></li>
        <li><a href="{{ route('admin.customers') }}" class="{{ Request::is('admin/customers*') ? 'is-active' : null }}">Customers</a></li>
        <li><a href="{{ route('admin.files') }}" class="{{ Request::is('admin/files*') ? 'is-active' : null }}">Files</a></li>
    </ul>

    <p class="menu-label">
        Settings
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.partners') }}" class="{{ Request::is('admin/settings/partners*') ? 'is-active' : null }}">Partners</a></li>
        <li><a href="{{ route('admin.coupons') }}" class="{{ Request::is('admin/settings/coupons*') ? 'is-active' : null }}">Coupons</a></li>
        {{--<li><a href="{{ route('admin.users') }}" class="{{ Request::is('admin/settings/users*') ? 'is-active' : null }}">Users</a></li>--}}
    </ul>

</aside>
