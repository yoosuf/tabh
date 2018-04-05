@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>

    <div class="section my-orders account-container">
        <div class="container">
            <div class="columns">

                <div class="column is-12 fullwidth">

                    <div class="columns">
                        <div class="column is-3 is-hidden-mobile">
                            @include('app.account._nav')
                        </div>

                        <div class="column">

                            <div class="card">
                                <div class="card-content">

                                    <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.promos.txt_heading')}}</h1>
                                    <p class="subtitle is-5">{{ trans('quicksilver.account.promos.txt_sub_title')}}</p>

                                    <form action="{{ route('account.promos.invite') }}" method="POST">
                                        {{ csrf_field() }}

                                        @include('app.account.promo_codes._form')




                                    </form>



                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
