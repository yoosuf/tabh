@extends('layouts.admin')

@section('content')


    <div class="columns">
        <div class="column">
            <p class="title">Profile</p>

        </div>
    </div>




    <div class="columns">

        <div class="column is-8">


            <div class="card">
                <div class="card-content">


                    <form class="form" method="POST" action="{{ route('admin.account.profile.update') }}"
                          autocomplete="off">

                        {{ method_field('PUT') }}

                        @include('admin.account.profile._form')


                        <div class="field is-grouped">
                            <button type="submit" class="button is-link ">
                                {{ trans('quicksilver.reset.button')}}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
