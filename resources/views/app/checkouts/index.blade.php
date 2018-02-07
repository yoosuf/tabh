@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>


    <section class="section">

        <div class="container">

            <div class="columns">
                <div class="column is-6 is-offset-3">
            @if ($errors->any())
                <article class="message is-danger">
                    <div class="message-body">
                        <p>There is {{ $errors->count()  }} error (s) performing this action.</p>

                        <ul>

                    @foreach($errors->all() as $error)
                            <li>{{ $error }}.</li>
                    @endforeach
                        </ul>
                    </div>
                </article>
                <br>
            @endif
                </div>
            </div>

            <div class="columns">
                <div class="column is-6 is-offset-3">

                    @include('app.checkouts._login')

                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('order.add') }}">
                    {{ csrf_field() }}
                        @include('app.checkouts._prescription')

                        @include('app.checkouts._address')

                        @include('app.checkouts._payment')

                        @include('app.checkouts.coupon_codes')

                        @include('app.checkouts._cart')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection