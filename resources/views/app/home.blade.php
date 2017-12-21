@extends('layouts.app')

@section('content')

<section class="hero is-transparent nav-container position-fixed">
    @include('layouts.app._nav')
    <!-- <div class="hero-body home-header">
    </div> -->
</section>
<!-- <section class="section is-fullheight home-body">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column home-tab-item">
                <a href="{{ route('search', ['type' => 'pharmaceutical']) }}">
                    <h2>Pharmaceutical</h2>
                    <img style="width: 256px; height: 256px" src="{{ asset('/img/pharma.svg') }}">
                </a>
            </div>
            <div class="column home-tab-item">
                <a href="{{ route('search', ['type' => 'groceries']) }}">
                    <h2>Groceries</h2>
                    <img style="width: 256px; height: 256px" src="{{ asset('/img/groceries.svg') }}">
                </a>
            </div>
        </div>
    </div>
</section> -->
<section class="hero section is-fullheight home-body">
    <!-- <div class="nav-container-space"></div> -->
    <!-- <div class="container has-text-centered"> -->
        <div class="columns">
            <h2 class="main-desc main-desc1">Shopping the way you like it!</h2>
            <h2 class="main-desc main-desc2">Order online. Delivered to your doorstep.</h2>
            <div class="column home-tab-item pharmaceutical">
                <div>
                    <h2>Pharmacy</h2>
                    <a href="{{ route('search', ['type' => 'pharmaceutical']) }}">Shop Now</a>
                </div>
            </div>
            <div class="column home-tab-item groceries">
                <div>
                    <h2>Grocery</h2>
                    <a href="{{ route('search', ['type' => 'groceries']) }}">Shop Now</a>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>
    @endsection
