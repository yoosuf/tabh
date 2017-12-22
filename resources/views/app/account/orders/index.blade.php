@extends('layouts.app')

@section('content')

<section class="hero is-info">
    @include('layouts.app._nav')
</section>

<div class="section my-orders account-container">
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

                                @if(count($orders) > 0)

                                <table style="width: 100%;" class="my-orders-table mobile-card-ui">
                                    <thead>
                                        <tr>
                                            <td><strong>Id</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Created</strong></td>
                                        </tr>
                                    </thead>

                                    @foreach($orders as $order)
                                    <div class="my-order-item">
                                        <div class="id">
                                            <p class="my-order-item-item-title">ID</p>
                                            <span>{{$order->id}}</span>
                                        </div>
                                        <div class="created">
                                            <p class="my-order-item-item-title">Ordered At</p>
                                            <span>{{$order->created_at}}</span>
                                        </div>
                                        <div class="status">
                                            <!-- <p class="my-order-item-item-title">Status</p> -->
                                            <!-- <span>{{$order->status}}</span> -->
                                            <div class="status-icons">
                                                <div class="status-icon status-icon-ordered">
                                                    <p class="my-order-item-item-title">Ordered</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                <div class="status-icon status-icon-packed">
                                                    <p class="my-order-item-item-title">Packed</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                <div class="status-icon status-icon-shipped">
                                                    <p class="my-order-item-item-title">Shipped</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                <div class="status-icon status-icon-delivered">
                                                    <p class="my-order-item-item-title">Delivered</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <p class="my-order-item-item-title">&nbsp;</p>
                                            <div class="">
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
                                </div>
                                @endforeach

                            </table>

                            @else

                            There is no orders placed yet, <a href="{{ url('/') }}">start shopping now with {{ config('app.name', 'Laravel') }}</a>.


                            @endif



                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection
