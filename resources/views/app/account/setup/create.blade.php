@extends('layouts.app')

@section('content')


    <section class="hero is-info">
        @include('layouts.app._nav')
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-6">
                    </div>
                    <div class="column is-4 is-offset-2">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">

    <div class="columns">
    <div class="column is-offset-3 is-6">





        <div class="card">
            <div class="card-content">



                <p class="title is-3 is-spaced has-text-centered">{{ trans('quicksilver.account.setup.txt_heading')}}</p>
                <p class="subtitle is-4 has-text-centered">{{ trans('quicksilver.account.setup.txt_sub_title')}}</p>

                <div class="columns">
                    <div class="column is-offset-1 is-10">


              <form action="{{ route('account.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('app.account.addresses._address')


                  <div class="buttons is-centered">
                      <button class="button is-link  is-right">Make your online orders</button>

                  </div>


              </form>
            </div>
                </div>
            </div>
        </div>
                </div>

          </div>



    </div>
  </div>
    </section>


@endsection