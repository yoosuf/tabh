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
        <div class="column">
            <div class="card">
                <div class="card-content">


                    <h1 class="title is-1">Orders</h1>
                    {{ $data['order_total_count'] }}


                    {{ $data['order_completed_count'] }}

                </div>

            </div>

        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">


                    <h1 class="title is-1">Customers</h1>
                    {{ $data['customer_count'] }}

                    {{ $data['customer_de_active_count'] }}
                    {{ $data['customer_active_count'] }}

                </div>

            </div>

        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">



                    <h1 class="title is-1">Products</h1>

                    {{ $data['product_count'] }}

                    {{ $data['product_de_active_count'] }}
                    {{ $data['product_active_count'] }}
                </div>

            </div>

        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">


                    <h1 class="title is-1">Partners</h1>


                    {{ $data['partner_count'] }}

                    {{ $data['partner_de_active_count'] }}
                    {{ $data['partner_active_count'] }}



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
