@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">Edit customer</p>


        </div>
    </div>



    <form action="{{ route('admin.customers.update', [$item->id])  }}" method="POST" accept-charset="UTF-8">

        {{ method_field('PUT') }}

        @include('admin.customers._form')


    </form>



@endsection
