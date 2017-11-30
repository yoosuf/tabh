@extends('layouts.admin')

@section('content')
    <p class="title">Partners</p>



    <form action="" method="POST">
        @include('admin.settings.partners._form')
    </form>

@endsection
