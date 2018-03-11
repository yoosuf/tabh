@extends('layouts.app')

@section('content')

<section class="hero is-info">
    @include('layouts.app._nav')
</section>

<div class="section my-orders account-container">
    <div class="container">
        <div class="columns">

            <div class="column">

                <div class="card-container">

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


                                                @if ($order->status == 'Approved' || $order->status == 'Packed' || $order->status == 'Shipped' || $order->status ==  'Completed')
                                                    <div class="status-icon status-icon-ordered is-active">
                                                        <p class="my-order-item-item-title">Ordered</p>
                                                        <span class="status-icon-container"></span>
                                                    </div>
                                                @else
                                                    <div class="status-icon status-icon-ordered">
                                                        <p class="my-order-item-item-title">Ordered</p>
                                                        <span class="status-icon-container"></span>
                                                    </div>
                                                @endif


                                                @if ($order->status == 'Packed' || $order->status == 'Shipped' || $order->status ==  'Completed')
                                                <div class="status-icon status-icon-packed is-active">
                                                    <p class="my-order-item-item-title">Packed</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @else
                                                <div class="status-icon status-icon-packed">
                                                    <p class="my-order-item-item-title">Packed</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @endif


                                                @if ($order->status == 'Shipped' || $order->status ==  'Completed') 
                                                <div class="status-icon status-icon-shipped is-active">
                                                    <p class="my-order-item-item-title">Shipped</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @else
                                                <div class="status-icon status-icon-shipped">
                                                    <p class="my-order-item-item-title">Shipped</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @endif

                                                @if ($order->status ==  'Completed') 
                                                <div class="status-icon status-icon-delivered is-active">
                                                    <p class="my-order-item-item-title">Delivered</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @else
                                                <div class="status-icon status-icon-delivered">
                                                    <p class="my-order-item-item-title">Delivered</p>
                                                    <span class="status-icon-container"></span>
                                                </div>
                                                @endif
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


                                                        <a href="{{ route('account.orders.show', [$order->id]) }}" class="button">View Order</a>

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </table>

                            @else





                                    There are no orders placed, <a href="{{ url('/') }}">start shopping now with {{ config('app.name', 'Laravel') }}</a>.


                            @endif


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
