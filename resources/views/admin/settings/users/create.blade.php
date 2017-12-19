@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">New User</p>


        </div>
    </div>
    @include('flash::message')


    <form action="{{ route('admin.users.store')  }}" method="POST" accept-charset="UTF-8">


        @include('admin.settings.users._form')


    </form>



@endsection
