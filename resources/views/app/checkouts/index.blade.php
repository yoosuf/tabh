@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">

            <div class="column">

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
@endsection
