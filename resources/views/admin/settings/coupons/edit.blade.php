@extends('layouts.admin')
@section('content')
    <div class="columns">
        <div class="column is-12">
            <p class="title">Edit Coupon</p>
        </div>
    </div>
    @include('flash::message')


    <div class="columns">
        <div class="column is-4">
    <form action="{{ route('admin.coupons.update', [$item->id])  }}" method="POST" accept-charset="UTF-8">
        {{ method_field('PUT') }}
        @include('admin.settings.coupons._form')
    </form>
        </div>
    </div>
@endsection
