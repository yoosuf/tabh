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

            <p>Order ID:  {{ isset($order->id) ? $order->id : '' }}</p>

            <p>Order Date:  {{ isset($order->created_at) ? $order->created_at : '' }}</p>
            <p>Status: {{ isset($order->status) ? $order->status : '' }} </p>
        </div>

        <div class="column">
            <p class="title">Customer Details</p>
            <p>{{ isset($order->user()->first()->email) ? $order->user()->first()->email : '' }}</p>
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
                            Total
                        </th>  
                        <th>                            
                            &#2547; {{ isset($order->total_amount) ? $order->total_amount : '' }}
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

       

            

            
        
        

        </div>
    </div>
      </div>
    </div>
@endsection