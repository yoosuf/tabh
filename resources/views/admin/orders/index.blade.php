@extends('layouts.admin')

@section('content')

    <form role="form" method="GET" action="{{ route('admin.orders') }}">

        <div class="columns">
            <div class="column">
                <p class="title">Orders</p>
            </div>
        </div>


        <div class="card">
            <div class="card-content">

                @include('admin.orders._filter')


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

                {{ $orders->links() }}

            </div>

        </div>
    </form>
@endsection

