@extends('layouts.app')

@section('content')

<section class="hero is-info">
    @include('layouts.app._nav')
</section>

<div class="section account-container">
    <div class="container">
        <div class="columns">

            <div class="column is-8 is-offset-2">

                <div class="columns">
                    <div class="column is-3 is-hidden-mobile">
                        @include('app.account._nav')
                    </div>

                    <div class="column">


                        <div class="card view-order">
                            <div class="card-content">

                                <h1 class="title is-4 is-spaced">Your order details</h1>
                                <hr>
                                <p class="subtitle is-5"></p>

                                <h2 class="is-success"><strong>Order Id </strong>: &nbsp;&nbsp; {{$order->id}}</h2>
                                <h2 class="is-success"><strong>Order Placed </strong>: &nbsp;&nbsp; {{$order->created_at}}</h2>
                                <h2 class="is-success"><strong>Order Status </strong>: &nbsp;&nbsp; {{$order->status}}</h2>
                                <h2 class="is-success"><strong>Order Address </strong>: &nbsp;&nbsp; </h2>
                                {{--@include('app.account.addresses._item', ['item' => $order->address()->first()])--}}
                                <div class="media-content order-address">
                                    <div class="content">
                                        <p>
                                            <strong>{{ $order->address()->first()->name }}</strong>
                                            <br>
                                            <strong>{{ $order->address()->first()->phone }}</strong>

                                            <address>
                                                {{ $order->address()->first()->address1 }}
                                                {{ $order->address()->first()->address2 }}

                                                {{ $order->address()->first()->city }}, {{ $order->address()->first()->province }}, {{ $order->address()->first()->postcode }}, {{ $order->address()->first()->country }}
                                            </address>

                                        </p>
                                    </div>
                                </div>
                                <br>
                                <h2 class="is-success"><strong>Order Prescription</strong> : </h2>
                                @if(isset($prescription) && $prescription != '')
                                <div class="field order-prescription">
                                    <!-- <label class="label">Prescription</label> -->
                                    <div class="boxa">
                                        <figure class="image is-128x128">
                                            <img src={{ url('/attachments/'. $prescription) }}>
                                        </figure>
                                    </div>
                                </div>
                                @endif
                                <br>
                                <h2 class="is-success"><strong>Order Items</strong> : </h2>
                                @foreach($line_items as $line_item)

                                <div class="order-item">
                                    <h3 class="is-success"><strong>by {{$line_item->partner()->first()->name}}</strong></h3>

                                    <div class="media" style="">
                                        <div class="media-content">
                                            <div class="content">
                                                <p>{{$line_item->product()->first()->title}} | &#2547; {{number_format(((float)$line_item->product()->first()->price), 2, '.', '')}} | {{$line_item->quantity}} units</p>
                                            </div>
                                        </div>
                                        <table>
                                            <tr>
                                                <div class="media-right">
                                                    <td>
                                                        <span class="">
                                                            <strong class="is-success">&#2547; {{number_format(((float)$line_item->quantity * number_format(((float)$line_item->product()->first()->price), 2, '.', '')), 2, '.', '')}}</strong>
                                                        </span>
                                                    </td>
                                                </div>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                @endforeach

                                <div class="card order-total">
                                    <div class="card-content">
                                        <table style="width: 100%;">
                                            @if($order->total_discount > 0)
                                            <tr>
                                                <td style="text-align: left">
                                                    <p class="subtitle is-6">Total Discount</p>
                                                </td>
                                                <td style="text-align: right">
                                                    <p class="subtitle is-6">
                                                        -&#2547; {{number_format(((float)$order->total_discount), 2, '.', '')}}</p>
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td style="text-align: left">
                                                        <h1 class="title is-4 is-spaced">Order Total</h1>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <h1 class="title is-4 is-spaced">
                                                            &#2547; {{number_format(((float)$order->total_amount), 2, '.', '')}}</h1>
                                                        </td>
                                                    </tr>
                                                    {{--<tr>--}}
                                                        {{--<td style="text-align: left">--}}
                                                            {{--<form role="form" method="POST" action="{{ route('order.discard') }}">--}}
                                                                {{--{{ csrf_field() }}--}}
                                                                {{--<br>--}}
                                                                {{--<input type="hidden" name="id" id="id" value="">--}}
                                                                {{--<button type="submit" class="button is-danger">- Discard Order -</button>--}}
                                                            {{--</form>--}}
                                                        {{--</td>--}}
                                                        {{--<td style="text-align: right">--}}
                                                            {{--<form role="form" method="POST" action="{{ route('order.add') }}">--}}
                                                                {{--{{ csrf_field() }}--}}
                                                                {{--<br>--}}
                                                                {{--<input type="hidden" name="id" id="id" value="">--}}
                                                                {{--<button type="submit" class="button is-success">- Place Order -</button>--}}
                                                            {{--</form>--}}
                                                        {{--</td>--}}
                                                    {{--</tr>--}}
                                                </table>
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