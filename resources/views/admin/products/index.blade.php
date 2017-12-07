@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="field is-grouped">
                <p class="title">Products</p>&nbsp;&nbsp;&nbsp;
                <button onclick="window.location.href = '/admin/products/create'; return true;" class="button is-primary">Add New Product</button>
            </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Generic Name</th>
                <th>Vendor</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Generic Name</th>
                <th>Vendor</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($products as $product)
            <tr>
                <th><a href="/admin/products/{{$product->id}}" class="level-item">{{$product->id}}</a></th>
                <td><a href="/admin/products/{{$product->id}}" class="level-item">{{$product->title}}</a></td>
                <td><a href="/admin/products/{{$product->id}}" class="level-item">{{$product->generic_name}}</a></td>
                <td>{{$product->vendor}}</td>
                <td>@if($product->published)
                        published
                    @else
                        <span class="icon">
                          <i class="fa fa-home"></i>
                        </span>
                    @endif
                </td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <div class="field is-grouped">
                    <button onclick="window.location.href = '/admin/products/'+ {{$product->id}} +'/edit'; return true;" class="button is-primary">Edit</button>&nbsp;
                    {{--@if($product->published)--}}
                        {{--<button class="button is-danger">Un-Publish</button>--}}
                    {{--@else--}}
                        {{--<button class="button is-primary">Publish</button>--}}
                    {{--@endif--}}
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            {{$products->links()}}
        </div>
    </div>
@endsection
