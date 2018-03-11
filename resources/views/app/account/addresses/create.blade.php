@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>

    <div class="section account-address-create account-container">
        <div class="container">
            <div class="columns">

                <div class="column">
                    <div class="card-container">

                    <div class="columns">
                        <div class="column is-3 is-hidden-mobile">
                            @include('app.account._nav')
                        </div>


                        <div class="column">

                            <div class="card">
                                <div class="card-content">

                                    <div class="columns">
                                        <div class="column">
                                            <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.address_create.txt_heading')}}</h1>
                                            <p class="subtitle is-5">{{ trans('quicksilver.account.address_create.txt_sub_title')}}</p>

                                        </div>
                                    </div>

                                    @include('flash::message')


                                    <form class="form" method="POST" action="{{ route('account.address.store') }}"
                                          autocomplete="off">

                                        @include('app.account.addresses._address')

                                        <div class="field is-grouped">
                                            <button type="submit" class="button is-link">
                                                {{ trans('quicksilver.reset.button')}}
                                            </button>
                                        </div>
                                    </form>

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
