@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>

    <div class="section my-orders">
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


                                    <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.orders.txt_heading')}}</h1>
                                    <p class="subtitle is-5">{{ trans('quicksilver.account.orders.txt_sub_title')}}</p>


                                    <table style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <td><strong>Id</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Created</strong></td>
                                        </tr>
                                        </thead>

                                            @foreach($orders as $order)
                                            <tr>
                                            <td>
                                                {{$order->id}}
                                            </td>
                                            <td>
                                                {{$order->status}}
                                            </td>
                                                <td>
                                                    <div class="media">

                                                        {{$order->created_at}}
                                                        <div class="media-right">


                                                            {{--<div class="dropdown is-right is-hoverable">--}}
                                                                {{--<div class="dropdown-trigger">--}}
                                                                    {{--<button class="button" aria-haspopup="true"--}}
                                                                            {{--aria-controls="dropdown-menu6">--}}
                                                                        {{--<span>Options</span>--}}
                                                                    {{--</button>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="dropdown-menu" id="dropdown-menu6" role="menu">--}}
                                                                    {{--<div class="dropdown-content">--}}
                                                                        <form role="form" method="POST" action="{{ route('account.order.show') }}">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="id" id="id" value="{{$order->id}}">
                                                                        <button class="button">
                                                                            View Order
                                                                        </button>
                                                                        {{--<hr class="dropdown-divider">--}}
                                                                        {{--<a href="#" class="dropdown-item">--}}
                                                                            {{--Cancel Order--}}
                                                                        {{--</a>--}}
                                                                        </form>
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}


                                                        </div>


                                                    </div>

                                            </td>
                                            </tr>
                                            @endforeach

                                    </table>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
