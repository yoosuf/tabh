@extends('layouts.admin')

@section('content')

    <p class="title">New Product</p>
    @include('flash::message')

            <form role="form" method="POST" enctype="multipart/form-data" action="/admin/products">
                @include('admin.products._form')
            </form>


@endsection