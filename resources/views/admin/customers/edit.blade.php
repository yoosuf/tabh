@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column is-12">


            <p class="title">{{ $data->name }}</p>


        </div>
    </div>


    <div class="columns">

        <div class="column is-8">


            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p class="title is-4">{{ $data->name }}</p>


                                <time datetime="2016-1-1">{{ Carbon\Carbon::now()->subDays(5)->diffForHumans() }}</time>
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
                        @if(count($orders) > 0)
                            @foreach($orders as $item)

                            @endforeach
                        @else
                            <p>This customer hasn't placed any orders yet.</p>

                        @endif
                        <p class="title is-6">Default address</p>
                        @if(count($orders) > 0)
                            @foreach($orders as $item)

                            @endforeach
                        @else
                            <p>This customer hasn't placed any orders yet.</p>

                        @endif
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title is-6">Tags</p>
                        @if(count($orders) > 0)
                            @foreach($orders as $item)

                            @endforeach
                        @else
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>





@endsection
