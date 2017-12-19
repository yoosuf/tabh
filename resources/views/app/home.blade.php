@extends('layouts.app')

@section('content')

<section class="hero is-info aaais-fullheight">
    @include('layouts.app._nav')
    <div class="hero-body home-header">
    </div>
</section>
<section class="hero home-body">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column home-tab-item">
                <a href="{{ route('search', ['type' => 'pharmaceutical']) }}">
                    <h2>Pharmaceutical</h2>
                    <!-- <img style="width: 256px; height: 256px" src="{{ asset('/img/pharma.svg') }}"> -->
                </a>
            </div>
            <div class="column home-tab-item">
                <a href="{{ route('search', ['type' => 'groceries']) }}">
                    <h2>Groceries</h2>
                    <!-- <img style="width: 256px; height: 256px" src="{{ asset('/img/groceries.svg') }}"> -->
                </a>
            </div>
            <div class="column home-tab-item">
                <a href="#123">
                    <h2>Temp</h2>
                    <!-- <img style="width: 256px; height: 256px" src="{{ asset('/img/groceries.svg') }}"> -->
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
