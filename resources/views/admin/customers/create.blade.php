@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">New customer</p>


        </div>
    </div>
    @include('flash::message')


    <form action="{{ route('admin.customers.store')  }}" method="POST" accept-charset="UTF-8">


        @include('admin.customers._form')


    </form>



@endsection
