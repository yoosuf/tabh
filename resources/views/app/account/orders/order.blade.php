@extends('layouts.app')

@section('content')

    <section class="hero is-info">
        @include('layouts.app._nav')
    </section>

    <div class="section account-container">
        <div class="container">
            <div class="columns">

                <div class="column">

                    <div class="card-container">
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
                                    <h2 class="is-success"><strong>Order Placed </strong>:
                                        &nbsp;&nbsp; {{$order->created_at}}</h2>
                                    <h2 class="is-success"><strong>Order Status </strong>:
                                        &nbsp;&nbsp; {{$order->status}}</h2>
                                    <h2 class="is-success"><strong>Order Via </strong>:
                                        &nbsp;&nbsp; {{$order->payment_type}}</h2>
                                    <h2 class="is-success"><strong>Order Address </strong>: &nbsp;&nbsp; </h2>
                                    {{--@include('app.account.addresses._item', ['item' => $order->address()->first()])--}}
                                    <div class="media-content order-address">
                                        <div class="content">
                                            <p>
                                                <strong>{{ isset($order->address()->first()->name) ? $order->address()->first()->name : "" }}</strong>
                                                <br>
                                                <strong>{{ isset($order->address()->first()->phone) ? $order->address()->first()->phone : "" }}</strong>

                                            <address>
                                                {{ isset($order->address()->first()->address1) ?  $order->address()->first()->address1 : "" }}
                                                {{ isset($order->address()->first()->address2) ? $order->address()->first()->address2 : "" }}

                                                {{ isset($order->address()->first()->city) ? $order->address()->first()->city : "" }}
                                                , {{ isset($order->address()->first()->district) ? $order->address()->first()->district : "" }}
                                                , {{ isset($order->address()->first()->postcode) ? $order->address()->first()->postcode : "" }}
                                                , {{ isset($order->address()->first()->country) ? $order->address()->first()->country : "" }}
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

                                    <br>
                                    @foreach($line_items as $line_item)
                                        <h3 class="is-success">
                                            <strong>by {{$line_item->partner()->first()->name}}</strong></h3>

                                        <div class="order-item">

                                            <div class="media" style="">
                                                <div class="media-content">
                                                    <div class="content">
                                                        <p>{{$line_item->product()->first()->title}} |
                                                            &#2547; {{number_format(((float)$line_item->product()->first()->price), 2, '.', '')}}
                                                            | {{$line_item->quantity}} units</p>
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
                                    <br>
                                    <br>
                                    @foreach($order->meta as $meta)
                                        <h3 class="is-success">
                                            <strong>by {{\App\Entities\Partner::find($meta['partner_id'])->name}}</strong>
                                        </h3>

                                        <div class="order-item">
                                            <div class="media" style="">
                                                <div class="media-content">
                                                    <div class="content">
                                                        <p>Delivery Amount</p>
                                                    </div>
                                                </div>
                                                <table>
                                                    <tr>
                                                        <div class="media-right">
                                                            <td>
                                                        <span class="">
                                                            <strong class="is-success">&#2547; {{number_format(((float)$meta['delivery_amount']), 2, '.', '')}}</strong>
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
                                                            <p class="subtitle is-6" style="color: white">Total
                                                                Discount</p>
                                                        </td>
                                                        <td style="text-align: right">
                                                            <p class="subtitle is-6" style="color: white">
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
    </div>
@endsection