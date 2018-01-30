@extends('layouts.admin')

@section('content')

    @include('flash::message')
    <form action="{{ route('admin.coupons.store')  }}" method="POST" accept-charset="UTF-8">
        @include('admin.settings.coupons._form')
    </form>
@endsection
