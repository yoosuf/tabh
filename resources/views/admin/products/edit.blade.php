@extends('layouts.admin')

@section('content')


    <p class="title">Edit product</p>
    @include('flash::message')
    <form role="form" method="POST" enctype="multipart/form-data"
          action="{{ route('admin.products.update', [$product->id]) }}">
        {{ method_field('PUT') }}

        @include('admin.products._form', ['item' => $product])
    </form>


@endsection