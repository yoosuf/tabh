@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>


    <section class="section">

        <div class="container">

            <div class="columns">
                <div class="column is-6 is-offset-3">
                    @include('layouts.app._flash')
                </div>
            </div>


            <div class="columns">
                <div class="column is-6 is-offset-3">

                    @include('app.checkouts._login')
                    @include('app.checkouts.coupon_codes')

                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('order.add') }}">
                        {{ csrf_field() }}
                        @include('app.checkouts._cart')
                        @include('app.checkouts._payment')
                        @include('app.checkouts._prescription')
                        @include('app.checkouts._address')
                        @if (auth()->check())

                        <div class="card checkouts-order-details-card">
                            <div class="card-content">
                              <button type="submit" class="button is-success">Place order</button>
                          </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
