@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">New User</p>


        </div>
    </div>
    @include('flash::message')




        <form action="{{ route('admin.users.update', [$item->id])  }}" method="POST" accept-charset="UTF-8">

            {{ method_field('PUT') }}

        @include('admin.settings.users._form')


    </form>



@endsection
