@extends('layouts.admin')

@section('content')


<div class="columns">
    <div class="column">
        <p class="title">Welcome to Dashboard, {{ Auth::guard('admin')->user()->name }}.</p>
    </div>
    <div class="column">
        <div class="buttons has-addons is-right">
        </div>

    </div>
</div>

<div class="columns">
    <div class="column dashboard-top-card">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-1">Orders</h1>
                <p>Total Orders : <b>{{ $data['order_total_count'] }}</b></p>
                <p>Completed: <b>{{ $data['order_completed_count'] }}</b></p>
                <p><b>&nbsp;</b></p>
            </div>
        </div>
    </div>
    <div class="column dashboard-top-card">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-1">Customers</h1>
                <p>Customers : <b>{{ $data['customer_count'] }}</b></p>
                <p>Deactivated : <b>{{ $data['customer_de_active_count'] }}</b></p>
                <p>Active : <b>{{ $data['customer_active_count'] }}</b></p>
            </div>
        </div>
    </div>
    <div class="column dashboard-top-card">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-1">Products</h1>
                <p>Products : <b>{{ $data['product_count'] }}</b></p>
                <p>Deactivated: <b>{{ $data['product_de_active_count'] }}</b></p>
                <p>Active : <b>{{ $data['product_active_count'] }}</b></p>
            </div>
        </div>
    </div>
    <div class="column dashboard-top-card">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-1">Partners</h1>
                <p>Partners : <b>{{ $data['partner_count'] }}</b></p>
                <p>Deactive : <b>{{ $data['partner_de_active_count'] }}</b></p>
                <p>Active : <b>{{ $data['partner_active_count'] }}</b></p>
            </div>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column">
        <div class="card">
            <div class="card-content">

            </div>
        </div>
    </div>
</div>



@endsection
