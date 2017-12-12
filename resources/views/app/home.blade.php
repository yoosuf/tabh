@extends('layouts.app')

@section('content')

    <section class="hero is-info is-fullheight">
        @include('layouts.app._nav')
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column">
                        <a href="{{ route('search', ['type' => 'pharmaceutical']) }}">
                            <img style="width: 256px; height: 256px" src="{{ asset('/img/pharma.svg') }}">
                        </a>
                    </div>
                    <div class="column">
                        <a href="{{ route('search', ['type' => 'groceries']) }}">
                            <img style="width: 256px; height: 256px" src="{{ asset('/img/groceries.svg') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
