@extends('layouts.app')

@section('content')
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ trans('quicksilver.search.heading')}}</h1>


                <div class="columns">
                    <div class="column is-half">


                        <form role="form" method="GET" action="{{ route('search') }}">
                            <input type="hidden" name="type" id="type" value="{{$type}}">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-medium" type="text" name="search" id="search"
                                           value="{{$search_quary}}"
                                           placeholder="{{ trans('quicksilver.search.search_placeholder')}}">
                                </div>
                                <div class="control">
                                    <button class="button is-link is-medium" type="submit">
                                        {{ trans('quicksilver.search.button')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="column is-half">
                        <form role="form" method="GET" action="{{ route('cart.show') }}">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="text-align: right">{{Cart::count()}} Items</td>
                                    {{--<td>Subtotal : &#2547; {{ Cart::subtotal() }}</td>--}}
                                    {{--<td>Tax : &#2547; {{ Cart::tax() }}</td>--}}
                                    <td style="text-align: right">Total : &#2547; {{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: right">
                                        <br>
                                        <button type="submit" class="button is-success">- Proceed to Checkout -</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>

    <div class="container">
        <div class="columns">

            <div class="column is-two-thirds">

                <div class="content">
                    <strong>Search Results</strong>
                </div>

                @if(count($products) > 0)
                    @foreach ($products as $product)
                        <form role="form" method="POST" action="{{ route('cart.add') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{$product->id}}">
                            <div class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <img src="https://bulma.io/images/placeholders/128x128.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>{{$product->title}}</strong>
                                            <small>{{$product->generic_name}}</small>
                                            <br>
                                            {{$product->product_type}}
                                            @if($product->product_type != "")
                                                |
                                            @endif
                                            {{$product->packsize}}
                                            <br>
                                            <small>by {{$product->partner()->first()->name}}</small>
                                            <br>
                                            <medium>&#2547; {{number_format(((float)$product->price), 2, '.', '')}}</medium>
                                        </p>
                                    </div>
                                </div>
                                <div class="media-right">
                                    <button type="submit" class="button is-success">- Add to Cart -</button>
                                </div>
                            </div>
                        </form>

                    @endforeach
                @else
                    <div class="media">
                        No results found for {{$search_quary}}
                    </div>
                @endif


                <br>
                {{--{{$products->links()}}--}}
            </div>

            <div class="column">

                <div class="content">
                    <strong>My Cart</strong>
                </div>
                @include('app.cart.index')
            </div>
        </div>
    </div>

    <br>
    <br>
@endsection
