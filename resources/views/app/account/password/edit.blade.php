@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-6">

                    @include('app.account._nav')




                    <form class="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">

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
