@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-content">
            <div class="field is-grouped">
                <p class="title">Order</p>&nbsp;
                <button onclick="window.history.go(-1); return false;" class="button is-text">Back</button>
            </div>

            <div class="field">
                <label class="label">ID</label>
                <div class="box">
                    <label class="label">{{ isset($order->id) ? $order->id : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">User</label>
                <div class="box">
                    <label class="label">{{ isset($order->user()->first()->email) ? $order->user()->first()->email : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Status</label>
                <div class="box">
                    <label class="label">{{ isset($order->status) ? $order->status : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Total</label>
                <div class="box">
                    <label class="label">{{ isset($order->total_amount) ? $order->total_amount : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Discount</label>
                <div class="box">
                    <label class="label">{{ isset($order->total_discount) ? $order->total_discount : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Tax</label>
                <div class="box">
                    <label class="label">{{ isset($order->tax) ? $order->tax : '' }}</label>
                </div>
            </div>

            <br>
            <p class="title">Items</p>&nbsp;

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
            <br>
            <div class="field is-grouped">
                <div class="control">
                    <button onclick="window.history.go(-1); return false;" class="button is-text">Back</button>
                </div>
            </div>

        </div>
    </div>

@endsection