@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-content">
            <p class="title">Product Edit</p>
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', [$product->id]) }}">

                <input type="hidden" name="_method" value="put" />
                @include('admin.products._form')
            </form>
        </div>
    </div>

@endsection