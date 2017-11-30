@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-content">
            <p class="title">Create Product</p>
            <form role="form" method="POST" action="/admin/products">
                @include('admin.products._form')
            </form>
        </div>
    </div>

@endsection