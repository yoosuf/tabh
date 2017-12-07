@extends('layouts.app')

@section('content')




  <div class="columns">
    <div class="column is-offset-3 is-6">

        <div class="card">
            <div class="card-content">

              <form action="{{ route('account.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <p class="title is-4">Welcome {{ Auth::user()->name }}</p>


                @include('app.account.addresses._address')




              
              <button class="button is-block is-link">Complete</button>

              </form>
            </div>

          </div>



    </div>
  </div>


@endsection