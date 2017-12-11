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


                </div>

            </div>

        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">


                    <h1 class="title is-1">Customers</h1>

                </div>

            </div>

        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">



                    <h1 class="title is-1">Products</h1>
                </div>

            </div>

        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">


                    <h1 class="title is-1">Partners</h1>

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
