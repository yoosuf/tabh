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


    <section class="section">

    <div class="container">
        <div class="columns">

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




                @include('app.checkouts._login')

                @include('app.checkouts._prescription')

                @include('app.checkouts._address')

                @include('app.checkouts._cart')


                @include('app.checkouts._payment')



            </div>



        </div>
    </div>
    </section>
@endsection
