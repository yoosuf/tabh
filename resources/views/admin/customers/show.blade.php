@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">{{ $data->fullName() }}</p>


        </div>
    </div>


    <div class="columns">

        <div class="column is-8">


            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img src="{{ $data->avatar() }}">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p class="title is-4">{{ $data->fullName() }}</p>
                                <time datetime="{{ $data->createdAt("atom") }}">{{ $data->createdAt("human") }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title is-4">Recent orders</p>
                        @if(count($orders) > 0)
                            @foreach($orders as $item)

                            @endforeach
                        @else
                            <p>This customer hasn't placed any orders yet.</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="column">


            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title is-6">Contact</p>

                        <p> <a href="mailto:{{ $data->email() }}">{{ $data->email() }}</a></p>

                        <p>{{ $data->phone() }}</p>

                        <p>{{ $data->hasAccount() }}</p>

                        <button class="modal-close is-large" aria-label="close"></button>


                        <div class="modal">
                            <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <p class="modal-card-title">Modal title</p>
                                    <button class="delete" aria-label="close"></button>
                                </header>
                                <section class="modal-card-body">
                                    <!-- Content ... -->
                                </section>
                                <footer class="modal-card-foot">
                                    <button class="button is-success">Save changes</button>
                                    <button class="button">Cancel</button>
                                </footer>
                            </div>
                        </div>


                        <p class="title is-6">Default address</p>


                        {!!  $data->primaryAddress() !!}



                    </div>
                </div>
            </div>


            {{--<div class="card">--}}
            {{--<div class="card-content">--}}
            {{--<div class="content">--}}
            {{--<p class="title is-6">Tags</p>--}}
            {{--@if(count($orders) > 0)--}}
            {{--@foreach($orders as $item)--}}

            {{--@endforeach--}}
            {{--@else--}}
            {{--<div class="field">--}}
            {{--<div class="control">--}}
            {{--<input class="input" type="text" placeholder="Text input">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>





@endsection
