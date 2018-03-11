@extends('layouts.admin')

@section('content')

    <div class="columns">
        <div class="column">
            <p class="title">Order # {{ $order->id }} </p>


        </div>
    </div>

    <div class="columns">
        <div class="column column is-8">


            <div class="card">
                <div class="card-content">


                    <div class="columns">
                        <div class="column">
                            <p class="title">Order Details</p>

                            <p>Order ID: {{ isset($order->id) ? $order->id : '' }}</p>

                            <p>Order Date: {{ isset($order->created_at) ? $order->created_at : '' }}</p>
                            <p>Status: {{ isset($order->status) ? $order->status : '' }} </p>
                            <p>Order Via: {{ isset($order->payment_type) ? $order->payment_type : '' }} </p>
                        </div>

                        <div class="column">
                            <p class="title">Customer Details</p>
                            <p>{{ $order->user->name }}</p>
                            <p>{{ $order->user->email }}</p>
                            <p>{{ $order->user->phone }}</p>

                            <br />
                            <h3>Delivery Address</h3>

                            <address>
                                <p>Name: {{ $order->primaryAddress->name }}</p>
                                <p>Phone: {{ $order->primaryAddress->phone }}</p>
                                <p>{{ $order->primaryAddress->address1 }}<br />
                                {{ $order->primaryAddress->address2 }}<br />
                                {{ $order->primaryAddress->city }}<br />
                                {{ $order->primaryAddress->district }}<br />
                                {{ $order->primaryAddress->country }}
                            </address>








                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">

                            <table class="table is-fullwidth is-hoverable is-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Qty
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Provider
                                    </th>

                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                                </thead>


                                <tfoot>


                                </tfoot>


                                <tbody>
                                @foreach($line_items as $line_item)
                                    <tr>
                                        <td>
                                            {{$line_item->quantity}}
                                        </td>
                                        <td>
                                            {{ $line_item->product->title }}
                                        </td>

                                        <td>
                                            {{ $line_item->partner->name }}
                                        </td>
                                        <td>
                                            &#2547; {{number_format(((float)$line_item->product()->first()->price), 2, '.', '')}}
                                        </td>
                                        <td>
                                            &#2547; {{number_format(((float)$line_item->quantity * number_format(((float)$line_item->product()->first()->price), 2, '.', '')), 2, '.', '')}}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <th colspan="3"></th>
                                    <th>
                                        Discount
                                    </th>
                                    <th>
                                        &#2547; {{ isset($order->total_discount) ? $order->total_discount : '' }}
                                    </th>
                                </tr>


                                <tr>
                                    <th colspan="3"></th>
                                    <th>
                                        Tax
                                    </th>
                                    <th>
                                        &#2547; {{ isset($order->tax) ? $order->tax : '' }}
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="3"></th>
                                    <th>
                                        Delivery Charges
                                    </th>
                                    <th>
                                        &#2547; {{ isset($delivery_charges) ? $delivery_charges : '' }}
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="3"></th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        &#2547; {{ isset($order->total_amount) ? $order->total_amount : '' }}
                                    </th>
                                </tr>
                                </tbody>
                            </table>


                            @if(isset($prescription) && $prescription != '')


                            <h2>Prescriptions</h2>
                                <div class="field order-prescription">
                                    <div class="boxa">
                                        <figure class="image is-128x128">
                                            <a href="{{ url('/attachments/'. $prescription) }}">
                                                <img src={{ url('/attachments/'. $prescription) }}>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection