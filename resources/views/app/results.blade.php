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




                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                        </div>
                    </div>
                    <div class="media-right">

                    <a class="button is-info is-outlined">Add to cart</a>


                    </div>
                </div>

                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                        </div>
                    </div>
                    <div class="media-right">
                        <button class="delete"></button>
                    </div>
                </div>



                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                        </div>
                    </div>
                    <div class="media-right">
                        <button class="delete"></button>
                    </div>
                </div>



                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                        </div>
                    </div>
                    <div class="media-right">
                        <button class="delete"></button>
                    </div>
                </div>



                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                        </div>
                    </div>
                    <div class="media-right">
                        <button class="delete"></button>
                    </div>
                </div>




            </div>


            <div class="column">

            </div>
        </div>
    </div>
@endsection
