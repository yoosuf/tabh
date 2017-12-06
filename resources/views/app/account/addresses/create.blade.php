@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-2">

                    <aside class="menu">
                        <p class="menu-label">
                            General
                        </p>
                        <ul class="menu-list">
                            <li><a class="" href="{{ route('account.orders') }}">My Orders</a></li>
                        </ul>
                        <p class="menu-label">
                            Settings
                        </p>
                        <ul class="menu-list">
                            <li><a class="" href="{{ route('account.profile') }}">My Profile</a></li>
                            <li><a class="" href="{{ route('account.address') }}">Addresses</a></li>
                            <li><a class="" href="{{ route('account.password') }}">Password</a></li>
                        </ul>

                    </aside>


                </div>


                <div class="column">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet atque cum laboriosam qui vel.
                    Accusamus cumque, ea error esse eum exercitationem explicabo harum ipsam laboriosam minus
                    perferendis praesentium quisquam veniam.


                </div>
            </div>
        </div>
    </div>
@endsection
