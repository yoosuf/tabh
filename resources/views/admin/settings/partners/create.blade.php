@extends('layouts.admin')

@section('content')
    <p class="title">New Partner</p>

    @include('flash::message')

    <form action="{{ route('admin.partners.store')  }}" method="POST" accept-charset="UTF-8">
    @include('admin.settings.partners._form')
    </form>

@endsection
