@extends('layouts.admin')

@section('content')


    <div class="columns">
        <div class="column">
            <p class="title">Orders</p>
        </div>
        {{--<div class="column">--}}
            {{--<div class="buttons has-addons is-right">--}}
                {{--<a href="{{ route('admin.orders') }}" class="button is-link">Add New Order</a>--}}
            {{--</div>--}}

        {{--</div>--}}
    </div>






    <div class="card">
        <div class="card-content">

            {{--<form action="{{ route('admin.orders') }}" method="GET">--}}

                {{--<div class="field has-addons">--}}
                    {{--<div class="control">--}}
            {{--<span class="select">--}}
            {{--<select>--}}
            {{--<option value="">Filter Customers</option>--}}
            {{--<option>£</option>--}}
            {{--<option>€</option>--}}
            {{--</select>--}}
            {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="control is-expanded">--}}
                        {{--<input class="input" type="text" name="q" placeholder="Search customers"--}}
                               {{--value="{{ old('q') }}"/>--}}
                    {{--</div>--}}
                    {{--<div class="control">--}}
                        {{--<button class="button" type="submit">--}}
                            {{--Search--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</form>--}}

            <table class="table is-fullwidth is-hoverable is-striped">
                <thead>
                <tr>
                    <th><abbr title="Played">Id</abbr></th>
                    <th width="200"><abbr title="Won">Status</abbr></th>
                    <th width="160"><abbr title="Drawn">Amount</abbr></th>
                    <th width="160"><abbr title="Lost">Discount</abbr></th>
                    <th width="160"><abbr title="Goals for">Tax</abbr></th>
                    <th width="160"><abbr title="Goals for">Actions</abbr></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Played">Id</abbr></th>
                    <th><abbr title="Won">Status</abbr></th>
                    <th><abbr title="Drawn">Amount</abbr></th>
                    <th><abbr title="Lost">Discount</abbr></th>
                    <th><abbr title="Goals for">Tax</abbr></th>
                    <th><abbr title="Goals for">Actions</abbr></th>
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

@endsection

