@extends('layouts.admin')

@section('content')

    <form role="form" method="GET" action="{{ route('admin.orders') }}">

        <div class="columns">
            <div class="column">
                <p class="title">Orders</p>
            </div>
            <br>
            {{--{{dd($customer_id == $customers[0]->id)}}--}}
            <div class="card">
                <div class="card-content">
                    <div class="select is-halfwidth">
{{--                        {{dd($customer_id) }}--}}
                        <select name='customer_id' id='customer_id'>
                            @if(isset($customer_id) && $customer_id =! '')
                                <option value=''>Select Customer</option>
                            @else
                                <option value='' selected>Select Customer</option>
                            @endif
                            @foreach($customers as $customer)
                                @if(isset($customer_id) && ($customer_id == $customer->id))
                                    <option value='{{$customer->id}}' selected>{{$customer->email}}</option>
                                @else
                                    <option value='{{$customer->id}}'>{{$customer->email}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="select is-halfwidth">
                        <select name='status' id='status'>
                            <option value='' selected>Select Status</option>
                            @foreach($request_status as $r_status)
                            <option value='{{$r_status->status}}'>{{$r_status->status}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="buttons" style="height: 36px;">
                        <button class="button ">Filter</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-content">

                <table class="table is-fullwidth is-hoverable is-striped">
                    <thead>
                    <tr>
                        <th><abbr title="Order Id">Id</abbr></th>
                        <th><abbr title="Requested User">User</abbr></th>
                        <th width="200"><abbr title="Order Status">Status</abbr></th>
                        <th width="160"><abbr title="Order Total">Amount</abbr></th>
                        <th width="160"><abbr title="Total Discount">Discount</abbr></th>
                        <th width="160"><abbr title="Total Tax">Tax</abbr></th>
                        <th width="160"><abbr title="Actions">Actions</abbr></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th><abbr title="Order Id">Id</abbr></th>
                        <th><abbr title="Requested User">User</abbr></th>
                        <th><abbr title="Order Status">Status</abbr></th>
                        <th><abbr title="Order Total">Amount</abbr></th>
                        <th><abbr title="Total Discount">Discount</abbr></th>
                        <th><abbr title="Total Tax">Tax</abbr></th>
                        <th><abbr title="Actions">Actions</abbr></th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @if(count($orders) > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        {{ $order->id  }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        {{ $order->user()->first()->email  }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        {{ $order->status }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        &#2547; {{ $order->total_amount }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        &#2547; {{ $order->total_discount }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{$order->id}}">
                                        &#2547; {{ $order->tax }}
                                    </a>
                                </td>
                                <td>
                                    @include('admin.orders._menu')
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5">No orders found</th>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>

        </div>
    </form>
@endsection

