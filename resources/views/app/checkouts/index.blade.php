@extends('layouts.app')

@section('content')



    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ trans('quicksilver.search.heading')}}</h1>


                <div class="columns">
                    <div class="column is-half">


                        <form action="{{ route('search') }}">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-medium" type="text"
                                           placeholder="{{ trans('quicksilver.search.search_placeholder')}}">
                                </div>
                                <div class="control">
                                    <button class="button is-link is-medium" type="submit">
                                        {{ trans('quicksilver.search.button')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

            </div>



        </div>
    </div>
@endsection
