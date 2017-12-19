@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>


    <section class="section">

        <div class="container">
            <!-- <div class="columns">

                <div class="column is-6 is-offset-3">

                    <ul class="steps is-narrow is-medium is-centered has-content-centered">
                        <li class="steps-segment">
                            <a href="#" class="has-text-dark">
                       <span class="steps-marker">
                         <span class="icon">
                           <i class="fa fa-shopping-cart"></i>
                         </span>
                       </span>
                                <div class="steps-content">
                                    <p class="heading">Shopping Cart</p>
                                </div>
                            </a>
                        </li>
                        <li class="steps-segment">
                            <a hef="#" class="has-text-dark">
                       <span class="steps-marker">
                         <span class="icon">
                           <i class="fa fa-user"></i>
                         </span>
                       </span>
                                <div class="steps-content">
                                    <p class="heading">User Information</p>
                                </div>
                            </a>
                        </li>
                        <li class="steps-segment is-active has-gaps">
                     <span class="steps-marker">
                       <span class="icon">
                         <i class="fa fa-usd"></i>
                       </span>
                     </span>
                            <div class="steps-content">
                                <p class="heading">Payment</p>
                            </div>
                        </li>
                        <li class="steps-segment">
                     <span class="steps-marker is-hollow">
                       <span class="icon">
                         <i class="fa fa-check"></i>
                       </span>
                     </span>
                            <div class="steps-content">
                                <p class="heading">Confirmation</p>
                            </div>
                        </li>
                    </ul>


                </div>
            </div> -->

            <div class="columns">
                <div class="column is-6 is-offset-3">
            @if ($errors->any())
                <article class="message is-danger">
                    <div class="message-body">
                        <p>There is {{ $errors->count()  }} error (s) performing this action.</p>
                    </div>
                    @foreach($errors->all() as $error)
                        <div class="message-body">
                            <p>{{ $error }}.</p>
                        </div>
                        <br>
                    @endforeach
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

                        @include('app.checkouts._cart')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
