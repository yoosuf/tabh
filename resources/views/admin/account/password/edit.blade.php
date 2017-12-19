@extends('layouts.admin')

@section('content')


    <div class="columns">
        <div class="column">
            <p class="title">Password</p>

        </div>
    </div>


            <div class="columns">

                <div class="column is-8">







                    <div class="card">
                        <div class="card-content">



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

@endsection
