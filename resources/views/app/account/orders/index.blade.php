@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8 is-offset-2">

                    @include('app.account._nav')




                    <div class="card">
                        <div class="card-content">


                            <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.orders.txt_heading')}}</h1>
                            <p class="subtitle is-5">{{ trans('quicksilver.account.orders.txt_sub_title')}}</p>



                            <div class="media">

                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                        </p>
                                    </div>
                                </div>
                                <div class="media-right">


                                    <div class="dropdown is-right is-hoverable">
                                        <div class="dropdown-trigger">
                                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu6">
                                                <span>Options</span>
                                            </button>
                                        </div>
                                        <div class="dropdown-menu" id="dropdown-menu6" role="menu">
                                            <div class="dropdown-content">
                                                <a href="#" class="dropdown-item">
                                                    View Order
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a href="#" class="dropdown-item">
                                                    Cancel Order
                                                </a>
                                            </div>
                                        </div>
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
