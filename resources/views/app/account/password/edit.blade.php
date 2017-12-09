@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8 is-offset-2">

                    <div class="columns">
                        <div class="column is-3 is-hidden-mobile">
                            @include('app.account._nav')
                        </div>


                        <div class="column">





                    <div class="card">
                        <div class="card-content">

                            <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.password.txt_heading')}}</h1>
                            <p class="subtitle is-5">{{ trans('quicksilver.account.password.txt_sub_title')}}</p>


                            <form class="form" method="POST" action="{{ route('account.password.update') }}" autocomplete="off">

                                {{ method_field('PUT') }}
                        @include('app.account.password._form')


<div class="field is-grouped">
        <button type="submit" class="button is-link">
            {{ trans('quicksilver.reset.button')}}
        </button>
</div>

                    </form>

                        </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
