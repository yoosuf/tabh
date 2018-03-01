@extends('layouts.admin')

@section('content')

    <form role="form" method="GET" action="{{ route('admin.products') }}">
        <div class="columns">
            <div class="column">
                <p class="title">Products</p>

                @include('flash::message')
            </div>
            <div class="column">
                <div class="buttons has-addons is-right">
                    <a href="{{ route('admin.products.create') }}" class="button is-link">Add New Product</a>
                </div>

            </div>
        </div>


        <div class="card">
            <div class="card-content">



                {{-- 
                @include('admin.products._filter')
                --}}

                <table class="table is-striped is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product Type</th>

                        <th>Price</th>
                        <th>Partner</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product Type</th>
                        <th>Price</th>
                        <th>Partner</th>
                        <th>Status</th>

                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                {{$product->kind}}
                            </td>

                            <td>৳ {{$product->price}}</td>
                            <td>
                                {{$product->partner->name }}
                            </td>
                            <td>@if($product->published)
                                    <span class="tag is-link">Activated</span>
                                @else
                                    <span class="tag is-warning">De-activated</span>

                                @endif
                            </td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                @include('admin.products._menu', ['item' => $product])

                                {{--<div class="field is-grouped">--}}
                                {{--<button onclick="window.location.href = '/admin/products/'+ {{$product->id}} +'/edit'; return true;" class="button">Edit</button>&nbsp;--}}
                                {{--@if($product->published)--}}
                                {{--<button class="button is-danger">Un-Publish</button>--}}
                                {{--@else--}}
                                {{--<button class="button is-primary">Publish</button>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </form>
@endsection
