@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-6">
                    </div>
                    <div class="column is-4 is-offset-2">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8 is-offset-2">

                    <div class="columns">
                        <div class="column is-3 is-hidden-mobile">
                            @include('app.account._nav')
                        </div>


                        <div class="column">

                    <div class="card">
                        <div class="card-content">

                            <div class="columns">
                                <div class="column is-8">
                                    <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.address.txt_heading')}}</h1>
                                    <p class="subtitle is-5">{{ trans('quicksilver.account.address.txt_sub_title')}}</p>

                                </div>
                                <div class="column">
                                    <div class="buttons has-addons is-right">
                                        <a href="{{ route('account.address.create') }}" class="button is-link">New Address</a>
                                    </div>

                                </div>
                            </div>


                            <div id="addressList">

                            @foreach($data as $item)
                                @include('app.account.addresses._item', ['item' => $item])
                            @endforeach
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
