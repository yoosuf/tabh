@extends('layouts.app')

@section('content')
    <section class="hero is-info">
        @include('layouts.app._nav')
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-6">
                        @include('app._search_form')
                    </div>
                    <div class="column is-4 is-offset-2">
                        @include('app._cart_mini')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section search-results">
        <div class="container">
            <div class="columns">
                <div class="column is-8">
                    @include('app._products')
                </div>
                <div class="column is-4">
                    @include('app._cart')
                </div>
            </div>
        </div>
    </section>
@endsection
