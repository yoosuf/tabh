@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">Edit Partner</p>

            @include('flash::message')
        </div>
    </div>



    <form action="{{ route('admin.partners.update', [$item->id])  }}" method="POST" accept-charset="UTF-8">

        {{ method_field('PUT') }}

        @include('admin.settings.partners._form')


    </form>



@endsection
