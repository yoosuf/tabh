@extends('layouts.app')

@section('content')



    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ trans('quicksilver.search.heading')}}</h1>


                <div class="columns">
                    <div class="column is-half">


                        <form action="{{ route('search') }}">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-medium" type="text"
                                           placeholder="{{ trans('quicksilver.search.search_placeholder')}}">
                                </div>
                                <div class="control">
                                    <button class="button is-link is-medium" type="submit">
                                        {{ trans('quicksilver.search.button')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="columns">

            <div class="column is-two-thirds">




Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet atque cum laboriosam qui vel. Accusamus cumque, ea error esse eum exercitationem explicabo harum ipsam laboriosam minus perferendis praesentium quisquam veniam.

            </div>


            <div class="column">

            </div>
        </div>
    </div>
@endsection
