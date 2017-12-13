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

    <div class="section">
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

                                    <h1 class="title is-4 is-spaced">Your order details</h1>
                                    <p class="subtitle is-5"></p>

                                    <h2 class="is-success">Order Id : {{$order->id}}</h2>
                                    <br>
                                    <h2 class="is-success">Order Placed : {{$order->created_at}}</h2>
                                    <br>
                                    <h2 class="is-success">Order Status : {{$order->status}}</h2>
                                    <br>
                                    @foreach($line_items as $line_item)

                                        <h3 class="is-success">by {{$line_item->partner()->first()->name}}</h3>

                                        <div class="media" style="padding-left: 100px;">
                                            <div class="media-content">
                                                <div class="content">
                                                    <p>
                                                        <strong>{{$line_item->product()->first()->title}}
                                                            (&#2547; {{number_format(((float)$line_item->product()->first()->price), 2, '.', '')}}
                                                            ) ({{$line_item->quantity}} units)</strong>
                                                    </p>
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
                                    @endforeach

                                    <div class="card">
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